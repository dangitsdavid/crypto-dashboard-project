<?php
include_once('header2.php');
?>

<!-- Dashboard Start -->
<div class="container pt-3 pb-3 mt-4">
    <div class="row">
        <div class="col-md-4">
            <!-- Empty Column -->
        </div>
        <!-- Sign Up Form Start -->
        <div class="col-md-4">
            <h3 class="text-white text-center">Login Page</h3>
            <hr>
            <!-- Success Message After Signup -->
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "none") {
                    echo "<p class='text-success text-center'>Account successfully created.</p>";
                }
                if ($_GET["error"] == "missinginput") {
                    echo "<p class='text-danger text-center'>Missing Username or Password.</p>";
                }
                if ($_GET["error"] == "wronglogin") {
                    echo "<p class='text-danger text-center'>Login failed. Wrong username or password.</p>";
                }
                if ($_GET["error"] == "signedout") {
                    echo "<p class='text-success text-center'>Successfully signed out.</p>";
                }
            }
            ?>
            <form action="./includes/login.inc.php" method="post">
                <!-- Email Address -->
                <!-- Username -->
                <div class="form-group">
                    <label class="col-form-label text-white" for="inputUid">Username</label>
                    <input type="text" name="inputUid" class="form-control rounded" placeholder="Username" id="inputUid" required>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="inputPassword" class="text-white">Password</label>
                    <input type="password" name="inputPwd" class="form-control rounded" id="inputPwd" placeholder="Password" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                </div>
                <button type="submit" class="btn btn-warning my-4 rounded" name="submit">Submit</button>
            </form>
        </div>
        <!-- Sign Up Form End -->
        <div class="col-md-4">
            <!-- Empty Column -->
        </div>
    </div>

</div>
<!-- Dashboard End -->

<?php
include_once('footer.php')
?>