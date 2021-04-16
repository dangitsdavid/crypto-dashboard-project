<?php
include_once('header.php');
?>

<!-- Dashboard Start -->
<div class="container pt-3 pb-3 mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Asset Dashboard -->
            <?php
            include('assets.php');
            ?>
        </div>
        <div class="col-md-9 p-4 rounded">
            <h1 class="pb-3 text-white">withdrawal Request</h1>
            <!-- Text Placeholder 
                <hr>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, <span style="color: rgb(241, 189, 75);">consectetur adipiscing elit,</span> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            -->

            <!-- Withdrawal Area-->
            <div class="container">
                <hr>
                <!-- Deposit Form -->
                <form>
                    <!-- Crypto Asset Selection -->
                    <fieldset class="form-group text-white">
                        <legend>Withdraw From Your Crypto Assets</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="withdrawalAssetSelection" id="BTC" value="BTC" checked="">
                                Bitcoin - BTC
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="withdrawalAssetSelection" id="ETH" value="ETH">
                                Ethereum - ETH
                            </label>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Crypto Asset Amount -->
                            <div class="form-group text-white">
                                <label class="control-label">Withdrawal Amount</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control form-control-sm rounded" aria-label="Amount" aria-describedby="feeDisclosure">
                                        <small id="feeDisclosure" class="form-text text-muted">NOTE: Please note that the final withdrawal amount will be subject to a withdrawal fee, depending on the Withdrawal Fund Type, as outlined by our fee schedule below.</small>
                                        <p class="text-muted">
                                            <u>Fee Schedule</u> <br>
                                            <small>
                                                BTC: 0.005 <br>
                                                ETH: 0.01 <br>
                                                USD: 20.00 <br>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Empty Column Space -->
                    </div>
                    <!-- Fiat or Crypto Amount -->
                    <fieldset class="form-group text-white">
                        <legend>Withdrawal Fund Type</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="withdrawalAssetType" id="wBTC" value="wBTC" checked="">
                                Bitcoin - BTC
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="withdrawalAssetType" id="wETH" value="wETH">
                                Ethereum - ETH
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="withdrawalAssetType" id="wUSD" value="wUSD">
                                US Dollar - USD
                            </label>
                        </div>
                    </fieldset>
                    <!-- Deposit Confirm Button to Modal -->
                    <hr>
                    <button type="button" class="btn btn-outline-warning btn-sm rounded">Submit</button>
                </form>
                <!-- Form End -->
            </div>
            <!-- Deposit Area End -->
        </div>
    </div>
</div>
<!-- Dashboard End -->

<?php
include_once('footer.php')
?>