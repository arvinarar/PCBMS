<?php
require_once '../model/ExpiredProductDAO.php';

$orderModel = new ExpiredProductDAO();

if ($_GET['action'] == 'create') {
    $data = $_POST;
    $orderModel->fileExpiredProduct($data);
    header('Location: ../expired_product/index.php');
}
?>