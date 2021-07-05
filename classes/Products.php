<?php

namespace app;

class Products extends Database
{


    public function add()
    {
        if(isset($_POST['dvd']))
        {
            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $size = $_POST['size'];
            $details='Size:'.' '.$size.' MB'; 

           
            if (empty($sku) || empty($name) || empty($price) || empty($size) )
            {
                header('location:../views/add-product.php?error=fillallfields');
                exit();
            }else

            if (!is_numeric($price) || !is_numeric($size))
            {
                header('location:../views/add-product.php?error=number');
                exit();
            }else

           { 
            $sql = "INSERT INTO products(sku,name,price,details) 
            VALUES (:sku,:name,:price,:details)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':details', $details);
            $statement->execute();


            header("location: ../views/index.php?status=success$details");
            exit();
        }

            ob_end_flush();

        };

        if(isset($_POST['furniture']))
        {
            $sku=$_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];
            $details ='Dimension:'.' '.$height.'x'.$width.'x'.$length;

            if (empty($sku) || empty($name) || empty($price) || empty($height) || empty($length) || empty($width) )
            {
                header('location: ../views/add-product.php?error=fillallfields');
                exit();
            }else

            if (!is_numeric($price) || !is_numeric($width) || !is_numeric($length) || !is_numeric($height))
            {
                header('location: ../views/add-product.php?error=number');
                exit();
            }else

            {
                $sql = "INSERT INTO products(sku,name,price,details) 
            VALUES (:sku,:name,:price,:details)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':details', $details);
            $statement->execute();

            header("location: ../views/index.php?status=success");
            exit();
            };

            
            ob_end_flush();


        };

        if(isset($_POST['book']))
        {
            $sku=$_POST['sku'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $weight = $_POST['weight'];
            $details = 'Weight:'.' '.$weight.' kg';


            if (empty($sku) || empty($name) || empty($price) || empty($weight) )
            {
                header('location: ../views/add-product.php?error=fillallfields');
                exit();
            }else

            if (!is_numeric($price) || !is_numeric($weight))
            {
                header('location: ../views/add-product.php?error=number');
                exit();
            }else

            {
             $sql = "INSERT INTO products(sku,name,price,details) 
            VALUES (:sku,:name,:price,:details)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':details', $details);
            $statement->execute();
    

            header("location: ../views/index.php?status=success");
            exit();
            };

            
            ob_end_flush();



        };
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($results))
        {
            return $results;
        }
    
    }

};