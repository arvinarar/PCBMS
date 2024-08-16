<?php
include_once "../model/ConnectionDAO.php";

class ExpiredProductDAO extends ConnectionDAO
{
    public function getAllExpiredProducts()
    {
        $qry = "SELECT * 
                FROM consigned_details E
                INNER JOIN consigned_product U
                ON U.cp_id = E.cp_id
                WHERE `expiry_date` <= CURDATE()
                AND NOT EXISTS(SELECT item_id FROM expired_items U WHERE U.item_id = E.item_id)";
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

    public function fileExpiredProduct($data)
    {
        $suppId = $data['supp_id'];
        $userId = $data['userid'];
        $itemId = $data['item_id'];
        $quantity = $data['quantity'];

        $qry = "INSERT INTO `expired` (`exp_id`, `supp_id`, `userid`, `assess_date`)
                VALUES (NULL, ?, ?, current_timestamp());
                INSERT INTO `expired_items` (`exp_no`, `exp_id`, `item_id`, `quantity`)
                VALUES (NULL, LAST_INSERT_ID(), ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $suppId);
            $stmt->bindParam(2, $userId);
            $stmt->bindParam(3, $itemId);
            $stmt->bindParam(4, $quantity);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}