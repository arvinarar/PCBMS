<?php
include_once "../model/ConnectionDAO.php";

class DTRDAO extends ConnectionDAO
{
    public function getDTRByEmdId($userId)
    {
        $qry = "SELECT *
                    FROM dtr
                    WHERE `empid`=?";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }

    }
    public function timeIn($userId)
    {
        $empId = $userId;
        $state = 'in';

        $qry = "INSERT INTO `dtr` (`id`, `empid`, `log`, `state`) VALUES (NULL, ?, current_timestamp(), ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $empId);
            $stmt->bindParam(2, $state);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }

    public function timeOut($userId)
    {
        $empId = $userId;
        $state = 'out';

        $qry = "INSERT INTO `dtr` (`id`, `empid`, `log`, `state`) VALUES (NULL, ?, current_timestamp(), ?)";
        try {
            $this->openConnection();
            $stmt = $this->dbh->prepare($qry);
            $stmt->bindParam(1, $empId);
            $stmt->bindParam(2, $state);
            $stmt->execute();
            $this->closeConnection();
        } catch (Exception $e) {
            $e->getMessage();
            return 0;
        }
    }
}
?>