<?php
require_once '../model/OrderDAO.php';
require_once '../model/SupplierDAO.php';
require_once '../model/UserDAO.php';
require_once '../model/productDAO.php';

$orderModel = new OrderDAO();
$supplierModel = new SupplierDAO();
$personnelModel = new UserDAO();
$productModel = new ProductDAO();
?>

<!-- Add Order Modal -->
<div class="row flex justify-content-center">
    <div class="col-8">
        <form action="order.php?action=create" method="POST">
            <div class="row">
                <div class="form-group col-4">
                    <label for="supp_id">Supplier</label>
                    <select class="form-control" id="supp_id" name="supp_id" required>
                        <?php $suppliers = $supplierModel->getAllSuppliers();
                        if (!empty($suppliers)) {
                            foreach ($suppliers as $supplier) { ?>
                                <option value=<?= $supplier['supp_id'] ?>>
                                    <?= $supplier['contact_person'] ?>
                                </option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="userid">Personnel</label>
                    <select class="form-control" id="userid" name="userid" required>
                        <?php $personnels = $personnelModel->getAllPersonnel();
                        if (!empty($personnels)) {
                            foreach ($personnels as $personnel) { ?>
                                <option value=<?= $personnel['userid'] ?>>
                                    <?= $personnel['lname'] . ", " . $personnel['fname'] . " " . $personnel['mname'] ?>
                                </option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="order_date">Order Date</label>
                    <input type="date" class="form-control" id="order_date" name="order_date"
                        value="<?php echo date('Y-m-d'); ?>" required>
                </div>
            </div>
            <h5 class="col-12">List of Products to Order</h5>
            <div class="row">
                <div class="form-group col-4">
                    <label for="prod_id">Products</label>
                    <select class="form-control" id="prod_id" name="prod_id">
                        <?php $products = $productModel->getAllProducts();
                        if (!empty($products)) {
                            foreach ($products as $product) { ?>
                                <option value=<?= $product['prod_id'] ?>>
                                    <?= $product['prod_name'] ?>
                                </option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="quantity">
                </div>
                <div class="form-group col-2">
                    <button type="button" class="btn btn-primary" onclick="addProductRow()">Add
                        Product</button>
                </div>
            </div>
            <div class="col-8">
                <table class="table table-bordered" id="productsTable">
                    <thead>
                        <tr>
                            <th class="col-5">Product</th>
                            <th class="col-5">Quantity</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['order_details'])) {
                            $orderDetails = $_POST['order_details'];
                            foreach ($orderDetails as $order_detail) { ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control"
                                            name=<?= $order_details[$order_detail['product']][$product] ?>
                                            value=<?= $order_detail['product'] ?> required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control"
                                            name=<?= $order_details[$order_detail['product']][$quantity] ?>
                                            value=<?= $order_detail['quantity'] ?> required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger"
                                            onclick="removeProductRow(this)">Remove</button>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Received">Received</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Order</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
    </div>
</div>

<script>
    function addProductRow() {
        var table = document.getElementById("productsTable");
        var row = table.insertRow();
        row.innerHTML = `
            <td>
                <input type="text" class="form-control" name="products[]" required>
            </td>
            <td>
                <input type="number" class="form-control" name="quantities[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeProductRow(this)">Remove</button>
            </td>
        `;
    }

    function removeProductRow(button) {
        var row = button.closest("tr");
        row.remove();
    }
</script>