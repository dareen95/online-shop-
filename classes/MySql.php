<?php

class MySql
{
    private $servername, $db_username, $db_password, $db_name;

    protected function connect()
    {
        $this->servername = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_name = 'store';
    
        $conn = new mysqli($this->servername, $this->db_username, $this->db_password, $this->db_name);
        return $conn;
    }


}


?>