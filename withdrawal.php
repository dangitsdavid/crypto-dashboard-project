<?php
include('header.php');
?>

<!-- Dashboard Start -->
<div class="container pt-3 pb-3 mt-4">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column">

                <h4 class="text-white text-center">
                    Your Assets
                </h4>

                <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
                    <a href="#" class="nav-link" style="color:#ffb84e">Bitcoin</a> <span class="text-white">0.0000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
                    <a href="#" class="nav-link" style="color:#ffd28e">USD Value</a> <span class="text-white">$0.00</span>
                </li><br>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
                    <a href="#" class="nav-link" style="color:#c6c5d4">Ethereum</a> <span class="text-white">0.0000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
                    <a href="#" class="nav-link" style="color:#efeef5">USD Value</a> <span class="text-white">$0.00</span>
                </li>
            </ul>
        </div>
        <div class="col-md-9 p-4 rounded">
            <h1 class="pb-3 text-white">withdrawal Request</h1>
            <!-- Text Placeholder 
                <p class="text-white">
                    Thank you for investing with us.
                </p>
                <p class="text-white">
                    Earn <span style="color: rgb(241, 189, 75);">8% APY</span> on your deposits. Interest calculated monthly.
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
include('footer.php')
?>