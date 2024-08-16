<?php
// Include the supplier_model.php file
require_once '../model/productDAO.php';

// Create a new instance of SupplierModel
$productModel = new ProductDAO();

// Check the action parameter and perform the corresponding action
if ($_GET['action'] == 'create') {
    $data = $_POST;
    $productModel->createProduct($data);
    header('Location: ../product/index.php');
} else if ($_GET['action'] == 'update') {
    $productId = $_GET['id'];
    $data = $_POST;
    $productModel->updateProduct($productId, $data);
    header('Location: ../product/index.php');
} else if ($_GET['action'] == 'delete') {
    $productId = $_GET['id'];
    $productModel->deleteProduct($productId);
    header('Location: ../product/index.php');
}
?>