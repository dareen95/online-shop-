<?php  

require_once 'MySql.php';


class Category extends MySql
{
    //Get all products
    public function getAll()
    {
        $query = "SELECT * FROM categories";

        $result = $this->connect()->query($query);
        $categories = [];
        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                array_push($categories, $row);
            }
        }
        return $categories;
    }

    //Get one Product
    public function getOne($id)
    {
        $query = "SELECT * FROM categories 
            WHERE category_id = $id";

        $result = $this->connect()->query($query);
        $category = null;
        if ($result->num_rows == 1) 
        {
            $category = $result->fetch_assoc(); 
        }
        return $category;
    }

    //Create new Product
    public function store(array $data)
    {
        //el function dy bet3mely escape L 3lamet el string
        $data['type'] = mysqli_real_escape_string($this->connect(), $data['type']);
        
        $query = "INSERT INTO categories (`type`)
            VALUES('{$data['type']}')";

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