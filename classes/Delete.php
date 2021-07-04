<?php

namespace app;

class Delete extends Database
{
   public function delete()
   {
    if (isset($_POST['delete']))
    {

        $ids =  $_POST['checkbox'];
     
           
        $id = implode(",",$ids);
        $sql =" DELETE FROM products WHERE id IN ($id)"; 
        $statement = $this->connect()->exec($sql);

        $sql =" DELETE FROM dvd WHERE category_id IN ($id)"; 
        $statement = $this->connect()->exec($sql);

        $sql =" DELETE FROM furniture WHERE category_id IN ($id)"; 
        $statement = $this->connect()->exec($sql);

        $sql =" DELETE FROM book WHERE category_id IN ($id)"; 
        $statement = $this->connect()->exec($sql);



        header("location: ../views/index.php?status=deleted");
        exit();

       

       
    }
   }
}