<?php
include_once "../model/ConnectionDAO.php";

class Order_DetailsDAO extends ConnectionDAO
{
    public function getOrderDetails($orderId)
    {
        $qry = "SELECT * 
                    FROM `order_details`
                    WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
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

    public function getProductId($orderId)
    {
        $qry = "SELECT `prod_id` 
                    FROM `order_details`
                    WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
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

    public function createOrderDetail($data)
    {
        $array = $data['order_details'];
        $suppId = $array['or_id'];
        $productId = $array['prod_id'];
        $quantity = $array['quantity'];

        $qry = "INSERT INTO `order_details` (`or_id`, `prod_id`, `quantity`) 
                    VALUES (null, ?, ?, ?')";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $suppId);
            $stmt->bindParam(2, $productId);
            $stmt->bindParam(3, $quantity);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function deleteOrderDetails($orderId)
    {
        $qry = "DELETE FROM order_details 
                    WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}
?>