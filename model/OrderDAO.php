<?php
include_once "../model/ConnectionDAO.php";

class OrderDAO extends ConnectionDAO
{
    public function getAllOrders()
    {
        $qry = "SELECT * 
                    FROM orders E
                    INNER JOIN order_details U
                    ON U.or_id = E.or_id";
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

    public function getAllOrdersFiltered($filter)
    {
        $qry = "SELECT * 
                    FROM orders E
                    INNER JOIN order_details U
                    ON U.or_id = E.or_id
                    WHERE `status` = ?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $filter);
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

    public function getOrderById($orderId)
    {
        $qry = "SELECT * 
                    FROM `orders` 
                    WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
            $stmt->execute();
            $ctr = 0;
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

    public function cancelOrder($orderId)
    {

        $qry = "UPDATE `orders`
                SET  `status`= 'Cancelled' 
                WHERE `or_id`=?;";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
            $stmt->execute();
            $ctr = 0;
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

    public function createOrder($data)
    {
        $suppId = $data['supp_id'];
        $userId = $data['userid'];
        $orderDate = $data['order_date'];
        $prodId = $data['prod_id'];
        $quantity = $data['quantity'];

        $qry = "INSERT INTO `orders` (`or_id`, `supp_id`, `userid`, `order_date`, `status`) 
                VALUES (NULL, ?, ?, ?, 'Pending');
                INSERT INTO `order_details` (`or_no`, `or_id`, `prod_id`, `quantity`) 
                VALUES (NULL, LAST_INSERT_ID(), ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $suppId);
            $stmt->bindParam(2, $userId);
            $stmt->bindParam(3, $orderDate);
            $stmt->bindParam(4, $prodId);
            $stmt->bindParam(5, $quantity);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function updateOrder($orderId, $data)
    {
        $suppId = $data['supp_id'];
        $userId = $data['userid'];
        $orderDate = $data['order_date'];
        $status = $data['status'];
        $prodId = $data['prod_id'];
        $quantity = $data['quantity'];

        $qry = "UPDATE `orders`
                SET `supp_id`=?, `userid`=?, `order_date`=?, `status`=? 
                WHERE `or_id`=?;
                UPDATE `order_details`
                SET `prod_id`=?, `quantity`=?
                WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $suppId);
            $stmt->bindParam(2, $userId);
            $stmt->bindParam(3, $orderDate);
            $stmt->bindParam(4, $status);
            $stmt->bindParam(5, $orderId);
            $stmt->bindParam(6, $prodId);
            $stmt->bindParam(7, $quantity);
            $stmt->bindParam(8, $orderId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function deleteOrder($orderId)
    {
        $qry = "DELETE FROM order_details 
                    WHERE `or_id`=?;
                DELETE FROM orders
                    WHERE `or_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $orderId);
            $stmt->bindParam(2, $orderId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}
?>