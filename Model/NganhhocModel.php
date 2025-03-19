<?php
Class nganhhocModel{
    private $conn;
    private $table_name = "nganhhoc";
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllnganhhocs() {
        $query = "SELECT *
                  FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

   
    
    
      
}
?>