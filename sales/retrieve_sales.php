<?php
require_once '../model/SalesDAO.php';
require_once '../model/CustomerDAO.php';
require_once '../model/UserDAO.php';

$salesModel = new SalesDAO();
$customerModel = new CustomerDAO();
$personnelModel = new UserDAO();

$result = $salesModel->getSales();
if (!empty($result)) {
    foreach ($result as $sales) { ?>
        <tr>
            <td>
                <?php $customers = $customerModel->getCustomerById($sales['cust_id']);
                if (!empty($customers)) {
                    foreach ($customers as $customer) { ?>
                        <?= $customer['name'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?php $personnels = $personnelModel->getPersonnelById($sales['userid']);
                if (!empty($personnels)) {
                    foreach ($personnels as $personnel) { ?>
                        <?= $personnel['lname'] . ", " . $personnel['fname'] . " " . $personnel['mname'] ?>
                    <?php }
                }
                ?>
            </td>
            <td>
                <?= $sales['date_issued'] ?>
            </td>
            <td>
                <?php $totalamount = 0;
                $salesDetails = $salesModel->getSalesDetails($sales['sale_id']);
                if (!empty($salesDetails)) {
                    foreach ($salesDetails as $details) {
                        $totalamount += $details['amount_sold'];
                    } ?>
                    <?= $totalamount ?>
                <?php }
                ?>
            </td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan="4">
            <div class="alert alert-info">No Sales Found.
            </div>
        </td>
    </tr>
<?php } ?>