$(document).ready(function(){
    $( "#btn" ).click(function() {
         var pass =  ($('#password').val()).toUpperCase();
         var user =  ($('#username').val()).toUpperCase();
         var url = $(location).attr('href');
         var hash = sha256.create();
            hash.update(pass+user);
            hash.hex(); 
        var key2 = $("#key").val();

        var obj = {user: user, url: url, hash:hash.toString()};
        var strBase64 = window.btoa(JSON.stringify(obj));
        $("#key").val(strBase64);
        $("#loginForm").submit();
    });
});