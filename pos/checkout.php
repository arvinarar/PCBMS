<?php
require_once '../model/POSDAO.php';
require_once '../model/CustomerDAO.php';

$POSModel = new POSDAO();
$customerModel = new CustomerDAO();

$customer_name = $_POST['customer_name'];
$products = json_decode($_POST['products'], true);

//Check first if customer already exist
$cust_id;
$result = $customerModel->doesCustomerExist($customer_name);
if (empty($result)) {
    $cust_id = $customerModel->createCustomer($customer_name);
} else {
    foreach ($result as $customer) {
        $cust_id = $customer['cust_id'];
    }
}

//Create Sales
session_start();
$sale_id = $POSModel->createSales($cust_id, $_SESSION['userid']);

foreach ($products as $product) {
    $POSModel->createSalesDetails($sale_id, $product['item_id'], $product['quantity'], $product['amount']);
    $POSModel->substractFromInventory($product['item_id'], $product['quantity']);
}

?>