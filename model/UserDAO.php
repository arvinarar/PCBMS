<?php
include_once "../model/ConnectionDAO.php";

class UserDAO extends ConnectionDAO
{
    function personnel($username, $password)
    {
        $qry = "SELECT *
                    FROM personnel E
                    INNER JOIN users U ON U.empid = E.empid
                    WHERE `username`=? and `password`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
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

    public function getAllPersonnel()
    {
        $qry = "SELECT *
                    FROM personnel E
                    INNER JOIN users U ON U.empid = E.empid";
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

    function getPersonnelById($userId)
    {
        $qry = "SELECT *
                    FROM personnel E
                    INNER JOIN users U ON U.empid = E.empid
                    WHERE `userid`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $userId);
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
}
?>