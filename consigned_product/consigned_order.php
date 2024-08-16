<?php
require_once '../model/ConsignedProductDAO.php';

$orderModel = new ConsignedProductDAO();

if ($_GET['action'] == 'create') {
    $data = $_POST;
    $orderModel->createConsignedProduct($data);
    header('Location: ../inventory/index.php');
}
?>