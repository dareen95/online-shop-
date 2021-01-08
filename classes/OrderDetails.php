<?php  

require_once 'MySql.php';


class OrderDetails extends MySql
{
    //Get all products
    public function getAll()
    {
        $query = "SELECT * FROM orderdetails";

        $result = $this->connect()->query($query);
        $orderdetails = [];
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($orderdetails, $row);
            }
        }
        return $orderdetails;
    }

    //Get one Product
    public function getOne($id)
    {
        $query = "SELECT * FROM orderdetails 
            WHERE id = '$id'";

        $result = $this->connect()->query($query);
        $orderdetails = null;
        if ($result->num_rows == 1) 
        {
            $orderdetails = $result->fetch_assoc(); 
        }
        return $orderdetails;
    }

    //Create new Product
    public function store(array $data)
    {
        $query = "INSERT INTO orderdetails (`order_id`, `product_id`, `priceEach`)
            VALUES('{$data['order_id']}', '{$data['product_id']}', '{$data['priceEach']}')";

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