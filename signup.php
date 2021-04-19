<?php
include_once('header2.php');
?>

<script src="/apps/signups/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>

<!-- Dashboard Start  -->
<div class="container pt-3 pb-3 mt-4">
    <section>
        <div class="row">
            <div class="col-md-4">
                <!-- Empty Column -->
            </div>
            <div class="col-md-4">
                <h3 class="text-white text-center">Sign Up</h3>
                <hr>
                <!-- Error Code Messages -->
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='text-danger text-center'>Please fill in all fields.</p>";
                    } else if ($_GET["error"] == "invaliduid") {
                        echo "<p class='text-danger text-center'>Invalid Username.</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p class='text-danger text-center'>Invalid Email.</p>";
                    } else if ($_GET["error"] == "passwordnomatch") {
                        echo "<p class='text-danger text-center'>Password does not match.</p>";
                    } else if ($_GET["error"] == "usernametaken") {
                        echo "<p class='text-danger text-center'>Username is already taken. Please try another username.</p>";
                    } else if ($_GET["error"] == "emailtaken") {
                        echo "<p class='text-danger text-center'>Email is taken. Please try another email.</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p class='text-danger text-center'>Something went wrong. Pleae try again or contact admin@btcoinbox.com</p>";
                    }
                }
                ?>
                <!-- Sign Up Form Start -->
                <form action="./includes/signup.inc.php" method="post">
                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-form-label text-white" for="inputName">Name</label>
                        <input type="text" name="inputName" class="form-control rounded" placeholder="Full Name" id="inputName" required>
                    </div>
                    <!-- Phone -->
                    <div class="form-group text-white">
                        <label class="col-form-label" for="inputPhone">Phone</label>

                        <input type="tel" class="form-control rounded" name="inputPhone" id="inputPhone" aria-required="1" placeholder="(___) ___-____" data-mask="(___) ___-____" autocomplete="off" aria-invalid="false" required>

                        <!-- <input type="tel" name="inputPhone" class="form-control rounded" aria-describedby="phoneFormat" placeholder="XXX-XXX-XXXX" id="inputPhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required> -->
                        <small id="phoneFormat" class="form-text text-muted">Format: (123) 456-7890</small>
                    </div>
                    <!-- Username -->
                    <div class="form-group">
                        <label class="col-form-label text-white" for="inputUid">Username</label>
                        <input type="text" name="inputUid" class="form-control rounded" placeholder="Username" id="inputUid" required>
                    </div>
                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="inputEmail" class="text-white">Email address</label>
                        <input type="email" name="inputEmail" class="form-control rounded" id="inputEmail" aria-describedby="emailHelp" placeholder="johndoe@email.com" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="inputPwd" class="text-white">Password</label>
                        <input type="password" name="inputPwd" class="form-control rounded" id="inputPwd" aria-describedby="pwdRequirement" placeholder="Password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <small id="pwdRequirement" class="form-text text-muted">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</small>
                    </div>
                    <!-- Repeat Password -->
                    <div class="form-group">
                        <label for="confirmPwd" class="text-white">Repeat Password</label>
                        <input type="password" name="confirmPwd" class="form-control rounded" id="confirmPwd" placeholder="Repeat Password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                    </div>
                    <button type="submit" class="btn btn-warning my-4 rounded" name="submit">Sign Up</button>
                </form>
                <!-- Signup Form End -->
            </div>
            <div class="col-md-4">
                <!-- Empty Column -->
            </div>
        </div>
        <!-- Row End -->
    </section>
    <!-- Form Section End -->
</div>
<!-- Dashboard End -->

<!--
---- Javascripts
--->
<script>
    /**
     * Password Validation
     */
    var password = document.getElementById("inputPwd"),
        confirm_password = document.getElementById("confirmPwd");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

<!-- Phone Mask JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $("#inputPhone").mask("(999) 999-9999");
</script>


<?php
include_once('footer.php')
?>