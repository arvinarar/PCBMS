<?php
include_once "../model/ConnectionDAO.php";

class ConsignedProductDAO extends ConnectionDAO
{
    public function getPendingOrders()
    {
        $qry = "SELECT * 
                    FROM orders E
                    INNER JOIN order_details U
                    ON U.or_id = E.or_id
                    WHERE `status`='Pending'";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->execute();
            $ctr = 0;
            $arrRows = array();
            $this->closeConnection();
            if ($stmt->rowCount() > 0) {
                while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $arrRows[$ctr] = $res;
                    $ctr++;
                }
            }
            return $arrRows;
        } catch (Exception $e) {
            $e->getMessage();
            return array(0 => "Empty");
        }
    }

    public function createConsignedProduct($data)
    {
        $suppId = $data['supp_id']; //
        $userId = $data['userid']; //
        $dateDelivered = $data['date_delivered']; //
        $prodId = $data['prod_id']; //
        $barcode = $data['barcode'];
        $particulars = $data['particulars']; //
        $expiryDate = $data['expiry_date']; //
        $unitPrice = $data['unit_price']; //
        $sellingPrice = $data['selling_price']; //
        $quantity = $data['quantity']; //
        $amount = $data['amount']; //
        $orderId = $data['or_id'];

        $qry = "INSERT INTO `consigned_product` (`cp_id`, `supp_id`, `userid`, `date_delivered`) 
                VALUES (NULL, ?, ?, ?);
                INSERT INTO `consigned_details` (`item_id`, `cp_id`, `prod_id`, `barcode`, `particulars`, `expiry_date`, `unit_price`, `selling_price`, `quantity`, `amount`) 
                VALUES (NULL, LAST_INSERT_ID(), ?, ?, ?, ?, ?, ?, ?, ?);
                UPDATE `orders` SET `status`='Received' WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $suppId);
            $stmt->bindParam(2, $userId);
            $stmt->bindParam(3, $dateDelivered);
            $stmt->bindParam(4, $prodId);
            $stmt->bindParam(5, $barcode);
            $stmt->bindParam(6, $particulars);
            $stmt->bindParam(7, $expiryDate);
            $stmt->bindParam(8, $unitPrice);
            $stmt->bindParam(9, $sellingPrice);
            $stmt->bindParam(10, $quantity);
            $stmt->bindParam(11, $amount);
            $stmt->bindParam(12, $orderId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}

?>