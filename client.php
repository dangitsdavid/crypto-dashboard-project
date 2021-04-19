<?php
require_once('includes/crypto.inc.php');
// GetBTCExchangeRate();

echo json_encode(GetETHExchangeRate('USD'));
