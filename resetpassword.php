<?php
include_once('header2.php');
?>

<!-- Dashboard Start -->
<div class="container pt-3 pb-3 mt-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Empty Column -->
        </div>
        <div class="col-md-4">
            <h3 class="text-white text-center">Reset your password</h3>
            <hr>
            <p class="text-white">
                An e-mail will be sent to you with instructions on how to reset your password.
            </p>
            <hr>
            <!-- Reset Password Form Start -->
            <form action="includes/resetrequest.inc.php" method="post">
                <!-- Email Address -->
                <div class="form-group">
                    <label for="resetEmail" class="text-white">Enter Your Email address</label>
                    <input type="email" name="resetEmail" class="form-control rounded" id="resetEmail" placeholder="johndoe@email.com" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                </div>
                <div class="text-center my-2">
                    <button type="submit" class="btn btn-warning rounded" name="reset-request-submit">Reset Password</button>
                </div>
            </form>
            <!-- Reset Password Form End -->
        </div>
        <div class="col-md-4">
            <!-- Empty Column -->
        </div>
    </div>

</div>
<!-- Dashboard End -->

<?php
include_once('footer.php')
?>