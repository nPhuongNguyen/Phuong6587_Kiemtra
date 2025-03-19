<?php
    require_once "./Connect/connect.php";
    require_once('./Model/HocPhanModel.php');
    
    class hocphanController{
        private $hocphanModel;
        private $db;
        public function __construct() {
            $this->db = (new Database())->getConnection();
            $this->hocphanModel = new hocphanModel($this->db);

        }
    
        public function index() {
            $hocphans = $this->hocphanModel->getAllhocphans();
          
            include "./View/hocphan/list.php"; 
        }   
        
    }
?>