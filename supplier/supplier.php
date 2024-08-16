<?php
// Include the supplier_model.php file
require_once '../model/SupplierDAO.php';

// Create a new instance of SupplierModel
$supplierModel = new SupplierDAO();

// Check the action parameter and perform the corresponding action
if ($_GET['action'] == 'create') {
    $data = $_POST;
    $supplierModel->createSupplier($data);
    header('Location: ../supplier/index.php');
} else if ($_GET['action'] == 'update') {
    $supplierId = $_GET['id'];
    $data = $_POST;
    $supplierModel->updateSupplier($supplierId, $data);
    header('Location: ../supplier/index.php');
} else if ($_GET['action'] == 'delete') {
    $supplierId = $_GET['id'];
    $supplierModel->deleteSupplier($supplierId);
    header('Location: ../supplier/index.php');
}
?>