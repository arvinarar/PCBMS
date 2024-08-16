<?php
include_once "../model/ConnectionDAO.php";

class InventoryDAO extends ConnectionDAO
{

    public function getAllInventory()
    {
        $qry = "SELECT *
                FROM consigned_details E
                INNER JOIN product U
                ON U.prod_id = E.prod_id
                WHERE NOT EXISTS(SELECT item_id FROM expired_items D WHERE D.item_id = E.item_id)";
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

    public function getInventory($search)
    {
        $qry = "SELECT *
                FROM consigned_details E
                INNER JOIN product U
                ON U.prod_id = E.prod_id
                WHERE prod_name LIKE '%$search%'
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
}