<?php
include_once "../model/ConnectionDAO.php";

class CustomerDAO extends ConnectionDAO
{
    public function createCustomer($name)
    {
        $qry = "INSERT INTO `customer` (`cust_id`,`name`,`address`) 
                    VALUES (NULL, ?, NULL)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $name);
            $stmt->execute();
            $id = $this->dbh->lastInsertId();
            $this->closeConnection();
            return $id;
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function doesCustomerExist($name)
    {
        $qry = "SELECT *
                    FROM `customer`
                    WHERE `name` = ?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $name);
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
            return 0;
        }
    }

    public function getCustomerById($cust_id)
    {
        $qry = "SELECT *
                    FROM `customer`
                    WHERE `cust_id` = ?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $cust_id);
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
            return 0;
        }
    }
}