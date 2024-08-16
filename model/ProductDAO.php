<?php
include_once "../model/ConnectionDAO.php";

class ProductDAO extends ConnectionDAO
{
    public function getAllProducts()
    {
        $qry = "SELECT * 
                    FROM `product`";
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

    public function getProductById($productId)
    {
        $qry = "SELECT * 
                    FROM `product` 
                    WHERE `prod_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $productId);
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

    public function createProduct($data)
    {
        $prodName = $data['prod_name'];
        $shelfLife = $data['shelf_life'];
        $unit = $data['unit'];
        $appreciation = $data['appreciation'];
        $maxQuantity = $data['max_quantity'];

        $qry = "INSERT INTO `product` (`prod_name`, `shelf_life`, `unit`, `appreciation`, `max_quantity`) 
                    VALUES (?, ?, ?, ?, ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $prodName);
            $stmt->bindParam(2, $shelfLife);
            $stmt->bindParam(3, $unit);
            $stmt->bindParam(4, $appreciation);
            $stmt->bindParam(5, $maxQuantity);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function updateProduct($productId, $data)
    {
        $prodName = $data['prod_name'];
        $shelfLife = $data['shelf_life'];
        $unit = $data['unit'];
        $appreciation = $data['appreciation'];
        $maxQuantity = $data['max_quantity'];

        $qry = "UPDATE `product`
                SET `prod_name`=?, `shelf_life`=?, `unit`=?, `appreciation`=?, `max_quantity`=? 
                WHERE `prod_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $prodName);
            $stmt->bindParam(2, $shelfLife);
            $stmt->bindParam(3, $unit);
            $stmt->bindParam(4, $appreciation);
            $stmt->bindParam(5, $maxQuantity);
            $stmt->bindParam(6, $productId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function deleteProduct($productId)
    {
        $qry = "DELETE FROM product 
                    WHERE `prod_id`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $productId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}

?>