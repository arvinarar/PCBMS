<?php
include_once "../model/ConnectionDAO.php";

class SupplierDAO extends ConnectionDAO
{

    public function getAllSuppliers()
    {
        $qry = "SELECT * 
                    FROM `supplier`";
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
            /* if ($ctr > 0) {
                return $arrRows;
            } else {
                return array(0 => "Empty");
            } */
        } catch (Exception $e) {
            $e->getMessage();
            return array(0 => "Empty");
        }
    }

    public function getSupplierById($supplierId)
    {
        $qry = "SELECT * 
                    FROM `supplier` 
                    WHERE `supp_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $supplierId);
            $stmt->execute();
            $ctr = 0;
            $this->closeConnection();
            if ($stmt->rowCount() > 0) {
                while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $arrRows[$ctr] = $res;
                    $ctr++;
                }
            }
            if ($ctr > 0) {
                return $arrRows;
            } else {
                return array(0 => "Empty");
            }
        } catch (Exception $e) {
            $e->getMessage();
            return array(0 => "Empty");
        }
    }

    public function createSupplier($data)
    {
        $company = $data['company'];
        $contactPerson = $data['contact_person'];
        $sex = $data['sex'];
        $phone = $data['phone'];
        $address = $data['address'];

        $qry = "INSERT INTO `supplier` (`company`, `contact_person`, `sex`, `phone`, `address`) 
                    VALUES (?, ?, ?, ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $company);
            $stmt->bindParam(2, $contactPerson);
            $stmt->bindParam(3, $sex);
            $stmt->bindParam(4, $phone);
            $stmt->bindParam(5, $address);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function updateSupplier($supplierId, $data)
    {
        $company = $data['company'];
        $contactPerson = $data['contact_person'];
        $sex = $data['sex'];
        $phone = $data['phone'];
        $address = $data['address'];

        $qry = "UPDATE `supplier`
                SET `company`=?, `contact_person`=?, `sex`=?, `phone`=?, `address`=? 
                WHERE `supp_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $company);
            $stmt->bindParam(2, $contactPerson);
            $stmt->bindParam(3, $sex);
            $stmt->bindParam(4, $phone);
            $stmt->bindParam(5, $address);
            $stmt->bindParam(6, $supplierId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function deleteSupplier($supplierId)
    {
        $qry = "DELETE FROM supplier 
                    WHERE `supp_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $supplierId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}
?>