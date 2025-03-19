<?php
    require_once "./Connect/connect.php";
    require_once('./Model/nganhhocModel.php');
    
    class nganhhocController{
        private $nganhhocModel;
        private $db;
        public function __construct() {
            $this->db = (new Database())->getConnection();
            $this->nganhhocModel = new nganhhocModel($this->db);

        }
    
        public function index() {
            $nganhhocs = $this->nganhhocModel->getAllnganhhocs();
          
            include "./View/nganhhoc/list.php"; 
        }   
        
    }
?>