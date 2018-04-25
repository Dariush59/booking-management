<?php

namespace BookingManagement\Model;

use Exception; 
class BaseModel 
{  
    protected $conn;

    function __construct() {
        $this->getConnection();
    }

    function __destruct() {
        $this->conn->close();
    }

    private function getConnection()
    {
        try{
            $conn = new \mysqli($GLOBALS['config']['host'], $GLOBALS['config']['username'], $GLOBALS['config']['password'], $GLOBALS['config']['dbname']);
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
                exit();
            } 
            $this->conn = $conn;
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }
}


?>