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
            <h1 class="pb-3 text-white">Deposit Request</h1>
            <!-- Words Placeholder 
                <p class="text-white">
                    Thank you for investing with us.
                </p>
                <p class="text-white">
                    Earn <span style="color: rgb(241, 189, 75);">8% APY</span> on your deposits. Interest calculated monthly.
                </p>
                -->

            <!-- Deposit Area-->
            <div class="container">
                <hr>
                <!-- Deposit Form -->
                <form>
                    <!-- Crypto Asset Selection -->
                    <fieldset class="form-group text-white">
                        <legend>Deposit Your Crypto Asset</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="depositAssetSelection" id="BTC" value="BTC" checked="">
                                Bitcoin - BTC
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="depositAssetSelection" id="ETH" value="ETH">
                                Ethereum - ETH
                            </label>
                        </div>
                    </fieldset>
                    <!-- Crypto Asset Amount -->
                    <div class="form-group text-white">
                        <label class="control-label">Deposit Amount</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                </div>
                                <input type="text" class="form-control form-control-sm rounded" aria-label="Amount" aria-describedby="feeDisclosure">
                                <small id="feeDisclosure" class="form-text text-muted">NOTE: Please be sure to account for the transaction fee. If we receive a smaller amount due to transaction fee, we will only account for the actual amount received</small>
                            </div>
                        </div>
                    </div>
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