<?php
// kết nối với cơ sở dữ liệu
// oop trong lập trình 
// lớp và đối tượng 
// class object
class connect
{

    private $conn;
    public function connect()
    {
        if ($this->conn === null) {
            $serverName = 'localhost';
            $userName = 'root';
            $password = '';
            $myDB = 'duan1';
            try {
                $this->conn = new PDO("mysql:host=$serverName;dbname=$myDB", $userName, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\Throwable $th) {
                echo 'Kết nối thất bại' . $th->getMessage();
                return null;
            }
        }
        return $this->conn;
    }
}
