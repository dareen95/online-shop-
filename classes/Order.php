<?php  

require_once 'MySql.php';


class Order extends MySql
{
    //Get all products
    public function getAll()
    {
        $query = "SELECT * FROM orders";

        $result = $this->connect()->query($query);
        $orders = [];
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($orders, $row);
            }
        }
        return $orders;
    }

    //Get one Product
    public function getOne($customerEmail)
    {
        $query = "SELECT * FROM orders 
            WHERE customerEmail = '$customerEmail'";

        $result = $this->connect()->query($query);
        $order = null;
        if ($result->num_rows == 1) 
        {
            $order = $result->fetch_assoc(); 
        }
        return $order;
    }

    //Create new Product
    public function store(array $data)
    {
        //el function dy bet3mely escape L 3lamet el string
        $data['customerName'] = mysqli_real_escape_string($this->connect(), $data['customerName']);
        $data['customerEmail'] = mysqli_real_escape_string($this->connect(), $data['customerEmail']);
        $data['customerAddress'] = mysqli_real_escape_string($this->connect(), $data['customerAddress']);

        $query = "INSERT INTO orders (`customerName`, `customerEmail`, `customerPhone`, `customerAddress`)
            VALUES('{$data['customerName']}', '{$data['customerEmail']}', '{$data['customerPhone']}', '{$data['customerAddress']}')";

        //el MySqli berg3ly true lw el create tam b naga7 fa lazm a3ml check 3shan at2ked 
        $result = $this->connect()->query($query);
        if ($result == true) 
        {
            return true; 
        }
        return false;
    }
}

?>