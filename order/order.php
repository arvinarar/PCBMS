<?php
require_once '../model/OrderDAO.php';
require_once '../model/Order_DetailsDAO.php';

$orderModel = new OrderDAO();
$orderDetailsModel = new Order_DetailsDAO();

if ($_GET['action'] == 'create') {
    $data = $_POST;
    $orderModel->createOrder($data);
    header('Location: ../order/index.php');
} else if ($_GET['action'] == 'update') {
    $orderId = $_GET['id'];
    $data = $_POST;
    $orderModel->updateOrder($orderId, $data);
    header('Location: ../order/index.php');
} else if ($_GET['action'] == 'cancel') {
    $orderId = $_GET['id'];
    $orderModel->cancelOrder($orderId);
    header('Location: ../order/index.php');
}
?>