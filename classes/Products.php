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

            if(!preg_match("/[^A-Za-z'-'_' ']/", $name)) {
                header('location:../views/add-product.php?error=lettersonly');
                exit();
            }else

           { 
                $sql = "INSERT INTO products(sku,name,price) 
            VALUES (:sku,:name,:price)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->execute();

            

                $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            $statement = $this->connect()->prepare($sql);
            $statement->execute(); 
            $results =  $statement->fetch(\PDO::FETCH_ASSOC);
            $category_id = $results['id'];



                $sql = "INSERT INTO dvd(category_id,size) VALUES (:ci,:size)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':ci', $category_id);
            $statement->bindValue(':size', $size);
            $statement->execute();



            header("location: ../views/index.php?status=success");
            exit();}

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

            if(!preg_match("/[^A-Za-z'-'_' ']/", $name)) {
                header('location:../views/add-product.php?error=lettersonly');
                exit();
            }else

            

            {
                $sql = "INSERT INTO products(sku,name,price) 
            VALUES (:sku,:name,:price)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->execute();

            

                $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            $statement = $this->connect()->prepare($sql);
            $statement->execute(); 
            $results =  $statement->fetch(\PDO::FETCH_ASSOC);
            $category_id = $results['id'];



                $sql = "INSERT INTO furniture(category_id,height,width,length) VALUES (:ci,:height,:width,:length)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':ci', $category_id);
            $statement->bindValue(':height', $height);
            $statement->bindValue(':width', $width);
            $statement->bindValue(':length', $length);
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

            if(!preg_match("/[^A-Za-z'-'_' ']/", $name)) {
                header('location:../views/add-product.php?error=lettersonly');
                exit();
            }else


            {
                $sql = "INSERT INTO products(sku,name,price) 
            VALUES (:sku,:name,:price)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':sku', $sku);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':price', $price);
            $statement->execute();

            

                $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            $statement = $this->connect()->prepare($sql);
            $statement->execute(); 
            $results =  $statement->fetch(\PDO::FETCH_ASSOC);
            $category_id = $results['id'];



                $sql = "INSERT INTO book(category_id,weight) VALUES (:ci,:weight)";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':ci', $category_id);
            $statement->bindValue(':weight', $weight);
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

    
    // public function dvd()
    // {

    //     $sql = "SELECT * FROM dvd";
    //     $statement = $this->connect()->prepare($sql);
    //     $statement->execute();
    //     $dvdresults = $statement->fetchAll(\PDO::FETCH_ASSOC);
        
    //    foreach( $dvdresults as $dvd)
    //    {
    //        echo $dvd['category_id'];
    //    }
    //     }

    
    // public function book()
    // {
    //     $sql = 'SELECT * FROM book';
    //     $statement = $this->connect()->prepare($sql);
    //     $statement->execute();
    //     $bookresults = $statement->fetchAll(\PDO::FETCH_ASSOC);
    //     foreach( $bookresults as $book)
    //    {
    //        echo $book['category_id'];
    //    }
        

    // }

    // public function furniture()
    // {
    //     $sql = 'SELECT * FROM furniture';
    //     $statement = $this->connect()->prepare($sql);
    //     $statement->execute();
    //     $furresults = $statement->fetchAll(\PDO::FETCH_ASSOC);
    //     foreach( $furresults as $fur)
    //    {
    //        echo $fur['category_id'].' ';
    //    }

    // }

};