<?php  

require_once 'MySql.php';


class Product extends MySql
{
    //Get all products
    public function getAll()
    {
        $query = "SELECT * FROM products";

        $result = $this->connect()->query($query);
        $products = [];
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($products, $row);
            }
        }
        return $products;
    }

    //Get one Product
    public function getOne($id)
    {
        $query = "SELECT * FROM products 
            WHERE product_id = '$id'";

        $result = $this->connect()->query($query);
        $product = null;
        if ($result->num_rows == 1) 
        {
            $product = $result->fetch_assoc(); 
        }
        return $product;
    }

    //Create new Product
    public function store(array $data)
    {
        //el function dy bet3mely escape L 3lamet el string
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connect(), $data['desc']);
        
        $query = "INSERT INTO products (`name`, `desc`, `price`, `img`, `quantity`, `category_id`, created_at)
            VALUES('{$data['name']}', '{$data['desc']}', '{$data['price']}', '{$data['img']}', '{$data['quantity']}', '{$data['category_id']}', CURRENT_TIME())";

        //el MySqli berg3ly true lw el create tam b naga7 fa lazm a3ml check 3shan at2ked 
        $result = $this->connect()->query($query);
        if ($result == true) 
        {
            return true; 
        }
        return false;
    }

    //Edit Product
    public function update($id, array $data)
    {
        //el function dy bet3mely escape L 3lamet el string
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connect(), $data['desc']);
        
        $query = "UPDATE products SET
            `name` = '{$data['name']}', 
            `desc` = '{$data['desc']}', 
            `price` = '{$data['price']}',
            `quantity` = '{$data['quantity']}',
            `category_id` = '{$data['category_id']}'
            WHERE product_id = '$id'";

        $result = $this->connect()->query($query);
        if ($result == true) 
        {
            return true; 
        }
        return false;
    }

    //Delete Product
    public function delete($id)
    {
        $query = "DELETE FROM products 
            WHERE product_id = '$id'";

        $result = $this->connect()->query($query);
        if ($result == true) 
        {
            return true; 
        }
        return false;
    }
}

?>