<?php
include_once "../model/ConnectionDAO.php";

class POSDAO extends ConnectionDAO
{
    public function ScanBarcode($search)
    {
        $qry = "SELECT *
                FROM consigned_details E
                INNER JOIN product U
                ON U.prod_id = E.prod_id
                WHERE barcode = $search
                AND NOT EXISTS(SELECT item_id FROM expired_items D WHERE D.item_id = E.item_id)";
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

    public function createSales($cust_id, $userid)
    {
        $qry = "INSERT INTO `sales` (`sale_id`,`date_issued`,`cust_id`, `userid`) 
                VALUES (NULL, current_timestamp(), ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $cust_id);
            $stmt->bindParam(2, $userid);
            $stmt->execute();
            $id = $this->dbh->lastInsertId();
            $this->closeConnection();
            return $id;
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function createSalesDetails($sale_id, $item_id, $qty_sold, $amount)
    {
        $qry = "INSERT INTO `sales_details` (`item_no`,`sale_id`,`item_id`, `qty_sold`, `amount_sold`) 
                VALUES (NULL, ?, ?, ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $sale_id);
            $stmt->bindParam(2, $item_id);
            $stmt->bindParam(3, $qty_sold);
            $stmt->bindParam(4, $amount);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function substractFromInventory($item_id, $quantity)
    {
        $qry = "UPDATE `consigned_details`
                SET `quantity` = `quantity` - ?
                WHERE `item_id` = ?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $quantity);
            $stmt->bindParam(2, $item_id);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}