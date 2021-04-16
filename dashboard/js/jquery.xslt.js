/*
* jquery.xslt.js
*
* Copyright (c) 2005-2008 Johann Burkard (<mailto:jb@eaio.com>)
* <http://eaio.com>
* 
* Permission is hereby granted, free of charge, to any person obtaining a
* copy of this software and associated documentation files (the "Software"),
* to deal in the Software without restriction, including without limitation
* the rights to use, copy, modify, merge, publish, distribute, sublicense,
* and/or sell copies of the Software, and to permit persons to whom the
* Software is furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included
* in all copies or substantial portions of the Software. 
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
* OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
* MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
* NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
* DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
* OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
* USE OR OTHER DEALINGS IN THE SOFTWARE.
* 
*/

/**
* jQuery client-side XSLT plugins.
* 
* @author <a href="mailto:jb@eaio.com">Johann Burkard</a>
* @version $Id: jquery.xslt.js,v 1.10 2008/08/29 21:34:24 Johann Exp $
*/

//2011-10-25 14:30 支持ie9

(function ($) {
    // ---------------------------------------------------------- 
    // A short snippet for detecting versions of IE in JavaScript 
    // without resorting to user-agent sniffing 
    // ---------------------------------------------------------- 
    // If you're not in IE (or IE version is less than 5) then: 
    //     ie === undefined 
    // If you're in IE (>=5) then you can determine which version: 
    //     ie === 7; // IE7 
    // Thus, to detect IE: 
    //     if (ie) {} 
    // And to detect the version: 
    //     ie === 6 // IE6 
    //     ie > 7 // IE8, IE9 ... 
    //     ie < 9 // Anything less than IE9 
    // ----------------------------------------------------------
    var ie = (function () {
        var undef, v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i');

        while (
            div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
            all[0]
        );
        /**/
        var ua = window.navigator.userAgent;
        //alert(ua);
        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            v = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf('rv:');
            if (rv != -1) { v = parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10); }
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
            // IE 12 => return version number
            v = parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        //return false;
        /**/
        return v > 4 ? v : undef;
    } ());


    $.fn.xslt = function () {
        return this;
    }

    var str = /^\s*</;
    if (document.recalc) { // IE 5+ ~ IE8
        $.fn.xslt = function (xml, xslt, fun) {
            var target = $(this);
            var change = function () {
                var c = 'complete';
                if (xm.readyState == c && xs.readyState == c) {
                    window.setTimeout(function () {
                        target.html(xm.transformNode(xs.XMLDocument));
                        if (fun) fun(target);
                    }, 50);
                } else if (xm.readyState == c) {
                    window.setTimeout(change, 200);
                }
            };

            var xm = document.createElement('xml');
            xm.onreadystatechange = change;
            xm[str.test(xml) ? "innerHTML" : "src"] = xml;

            var xs = document.createElement('xml');
            //xs.onreadystatechange = change;
            xs[str.test(xslt) ? "innerHTML" : "src"] = xslt;

            $('body').append(xm).append(xs);
            return this;
        };
    }
    else if (ie && ie > 8) { //IE9+
        $.fn.xslt = function (xml, xslt, fun) {
            //if (window.ActiveXObject) {
                var target = $(this);
                var xstt = new ActiveXObject("Msxml2.XSLTemplate.6.0");

                var xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
                xmlDoc.async = false;
                var xslDoc = new ActiveXObject("Msxml2.FreeThreadedDOMDocument.6.0");
                xslDoc.async = false;

//                if (window.ActiveXObject) {
//                    xhttp = new ActiveXObject("Msxml2.XMLHTTP");
//                }
//                else {
//                    xhttp = new XMLHttpRequest();
//                }
//                xhttp.open("GET", xslt, false);
//                try { xhttp.responseType = "msxml-document" } 
//                catch (err) { } // Helping IE11
//                xhttp.send("");

                xmlDoc.loadXML(xml);
                //xslDoc.loadXML(xhttp.xml);
                xslDoc.loadXML(xslt);
                xstt.stylesheet = xslDoc;
                var xslProc = xstt.createProcessor();
                xslProc.input = xmlDoc;
                xslProc.transform();
                target.html(xslProc.output);
                if (fun) fun(target);
            //}
            return this;
        };
    }
    else if (window.DOMParser != undefined && window.XMLHttpRequest != undefined && window.XSLTProcessor != undefined) { // Mozilla 0.9.4+, Opera 9+
        
        var processor = new XSLTProcessor();
        var support = false;
        if ($.isFunction(processor.transformDocument)) {
            support = window.XMLSerializer != undefined;
        }
        else {
            support = true;
        }
        if (support) {
            $.fn.xslt = function (xml, xslt, fun) {
                
                var target = $(this);
                var transformed = false;

                var xm = {
                    readyState: 4
                };
                var xs = {
                    readyState: 4
                };

                var change = function () {
                    if (xm.readyState == 4 && xs.readyState == 4 && !transformed) {
                        var processor = new XSLTProcessor();
                        if ($.isFunction(processor.transformDocument)) {
                            // obsolete Mozilla interface
                            resultDoc = document.implementation.createDocument("", "", null);
                            processor.transformDocument(xm.responseXML, xs.responseXML, resultDoc, null);
                            target.html(new XMLSerializer().serializeToString(resultDoc));
                            if (fun)
                                fun(target);
                        }
                        else {
                            processor.importStylesheet(xs.responseXML);
                            resultDoc = processor.transformToFragment(xm.responseXML, document);
                            target.empty().append(resultDoc);
                            if (fun)
                                fun(target);
                        }
                        transformed = true;
                    }
                };

                if (str.test(xml)) {
                    xm.responseXML = new DOMParser().parseFromString(xml, "text/xml");
                }
                else {
                    xm = $.ajax({ dataType: "xml", url: xml });
                    xm.onreadystatechange = change;
                }
//                /**/
//                if (window.ActiveXObject) {
//                    xhttp = new ActiveXObject("Msxml2.XMLHTTP");
//                }
//                else {
//                    xhttp = new XMLHttpRequest();
//                }
//                xhttp.open("GET", xslt, false);
//                try { xhttp.responseType = "msxml-document" } catch (err) { } // Helping IE11
//                xhttp.send("");

//                xslt = xhttp.responseText;
//                /**/
                if (str.test(xslt)) {
                //if (str.test(xhttp.responseText)) {
                    xs.responseXML = new DOMParser().parseFromString(xslt, "text/xml");
                    change();
                }
                else {
                    xs = $.ajax({ dataType: "xml", url: xslt });
                    xs.onreadystatechange = change;
                }
                return this;
            };
        }
    }
})(jQuery);