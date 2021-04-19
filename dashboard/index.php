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
            <h1 class="pb-3 text-white">Hi, <?php echo $user_fullname; ?>!</h1>
            <hr>
            <p class="text-white">
                The current USD price for BTC is
                <?php $currentBTCExchangeUSD = GetBTCExchangeRate('USD'); ?>
                <span class="text-white">
                    $<?php echo number_format($currentBTCExchangeUSD, 2, ".", ","); ?>
                </span>
            </p>
            <p class="text-white">
                The current USD price for ETH is
                <?php $currentBTCExchangeUSD = GetETHExchangeRate('USD'); ?>
                <span class="text-white">
                    $<?php echo number_format($currentBTCExchangeUSD, 2, ".", ","); ?>
                </span>
            </p>
            <p class="text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <p class="text-white">
                Lorem ipsum dolor sit amet, <span style="color: rgb(241, 189, 75);">consectetur adipiscing elit,</span> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </div>
</div>
<!-- Dashboard End -->

<?php
include_once('footer.php')
?>