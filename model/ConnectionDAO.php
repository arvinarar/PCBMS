<?php
class ConnectionDAO
{
    protected $username = "root";
    protected $password = "";
    protected $host = "localhost";
    protected $db_name = "arar_pcbms_db";
    protected $dbh = null;

    public function openConnection()
    {
        try {
            $this->dbh = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function closeConnection()
    {
        try {
            $this->dbh = null;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
?>