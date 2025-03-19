<?php
Class hocphanModel{
    private $conn;
    private $table_name = "hocphan";
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllhocphans() {
        $query = "SELECT *
                  FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }
      
}
?>