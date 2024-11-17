<?php

require_once __DIR__ . '/Models/PayPalModel.php';

use Models\PayPalModel;

try {
    $paypalModel = new PayPalModel();
    $client = $paypalModel->getClient();

    echo "Cliente de PayPal configurado correctamente.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
