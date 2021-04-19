<ul class="nav flex-column">

    <h4 class="text-white text-center">
        Your Assets
    </h4>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#ffb84e">Current BTC Price</a>
        <?php $currentBTCExchangeUSD = GetBTCExchangeRate('USD'); ?>
        <span class="badge badge-secondary" style="color: #9F5F00">
            $<?php echo number_format($currentBTCExchangeUSD, 2, ".", ","); ?>
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#ffb84e">BTC Portfolio</a> <span class="text-white">0.0000</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#ffd28e">USD Value</a> <span class="text-white">$0.00</span>
    </li>
    <br>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#c6c5d4">Current ETH Price</a>
        <?php $currentBTCExchangeUSD = GetETHExchangeRate('USD'); ?>
        <span class="badge badge-secondary">
            $<?php echo number_format($currentBTCExchangeUSD, 2, ".", ","); ?>
        </span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#c6c5d4">ETH Portfolio</a> <span class="text-white">0.0000</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center bg-primary">
        <a href="#" class="nav-link" style="color:#efeef5">USD Value</a> <span class="text-white">$0.00</span>
    </li>
</ul>