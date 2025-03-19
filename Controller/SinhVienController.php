<?php
    require_once "./Connect/connect.php";
    require_once('./Model/SinhVienModel.php');
    require_once('./Model/NganhhocModel.php');
    
    class SinhVienController{
        private $SinhVienModel;
        private $nganhhocModel;
        private $db;
        public function __construct() {
            $this->db = (new Database())->getConnection();
            $this->SinhVienModel = new SinhVienModel($this->db);
            $this->nganhhocModel = new nganhhocModel($this->db); 


        }
    
        public function index() {
            $SinhViens = $this->SinhVienModel->getAllSinhViens();
          
            include "./View/SinhVien/list.php"; 
        }

        public function createForm() {
            $nganhhocs = $this->nganhhocModel->getAllnganhhocs();
            include "./View/SinhVien/createSV.php"; // Hiển thị form thêm sinh viên
        }

        public function detail() {
            if (isset($_GET["MaSv"])) {
                $MaSV = $_GET["MaSv"];
                
                // Lấy thông tin user từ database
                $sv = $this->SinhVienModel->getById($MaSV);
                
                if (!$sv) {
                    echo "SV không tồn tại!";
                    return;
                }  
                include "./View/Sinhvien/detailSV.php"; // Load giao diện chỉnh sửa
            }
        }

        public function add() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $maSV = $_POST['maSV'];
                $hoTen = $_POST['hoTen'];
                $gioiTinh = $_POST['gioiTinh'];
                $ngaySinh = $_POST['ngaySinh'];
                $maNganh = $_POST['MaNganh'];
        
                // Xử lý hình ảnh
                $hinh = $_FILES['hinh'];
                $targetDir = "content/images/";
        
                // Tạo thư mục nếu chưa tồn tại
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
        
                $targetFile = $targetDir . basename($hinh["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
                // Kiểm tra xem hình ảnh có phải là hình ảnh thực sự không
                $check = getimagesize($hinh["tmp_name"]);
                if ($check === false) {
                    echo "Tập tin không phải là hình ảnh.";
                    $uploadOk = 0;
                }
        
                // Kiểm tra kích thước hình ảnh
                if ($hinh["size"] > 500000) { // Giới hạn kích thước 500KB
                    echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                    $uploadOk = 0;
                }
        
                // Kiểm tra định dạng hình ảnh
                if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                    echo "Xin lỗi, chỉ cho phép các định dạng hình ảnh JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }
        
                // Kiểm tra nếu $uploadOk được đặt thành 0 bởi một lỗi
                if ($uploadOk == 0) {
                    echo "Xin lỗi, hình ảnh của bạn không được tải lên.";
                } else {
                    if (move_uploaded_file($hinh["tmp_name"], $targetFile)) {
                        // Gọi phương thức thêm sinh viên với đường dẫn hình ảnh
                        if ($this->SinhVienModel->addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $targetFile, $maNganh)) {
                            header("Location: ?controller=sinhvien&action=index");
                            exit();
                        } else {
                            echo "Có lỗi xảy ra khi thêm sinh viên!";
                        }
                    } else {
                        echo "Xin lỗi, đã xảy ra lỗi khi tải hình ảnh của bạn.";
                    }
                }
            } else {
                $this->createForm(); // Hiển thị form nếu không phải POST
            }
        }

        public function edit() {
            if (isset($_GET["MaSv"])) {
                $MaSV = $_GET["MaSv"];
                
                // Lấy thông tin user từ database
                $sv = $this->SinhVienModel->getById($MaSV);
                
                if (!$sv) {
                    echo "SV không tồn tại!";
                    return;
                }  
                $nganhhocs = $this->nganhhocModel->getAllnganhhocs();
                include "./View/Sinhvien/editSV.php"; // Load giao diện chỉnh sửa
            }
        }

        public function delete() {
            if (isset($_GET["MaSv"])) {
                $MaSV = $_GET["MaSv"];
                
                // Lấy thông tin sinh viên từ database
                $sv = $this->SinhVienModel->getById($MaSV);
                
                if (!$sv) {
                    echo "Sinh viên không tồn tại!";
                    return;
                }  
                // Nếu chưa xác nhận, hiển thị view xác nhận xóa
                include "./View/SinhVien/deleteSV.php"; 
            }
        }

        public function deleteds(){
            if (isset($_GET["MaSv"])) {
                $MaSV = $_GET["MaSv"];
                
                // Lấy thông tin sinh viên từ database
                $sv = $this->SinhVienModel->deleteSinhVien($MaSV);
                
                if (!$sv) {
                    echo "Sinh viên không tồn tại!";
                    return;
                }  
                header("Location: ?controller=sinhvien&action=index");
            }
        }

        public function logins(){
            include('./View/SinhVien/login.php');
        }

        public function login() {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Lấy MaSV từ form
                $maSV = $_POST["MaSV"];
                
                // Kiểm tra thông tin sinh viên
                if ($this->SinhVienModel->checkMaSV($maSV)) {
                    // Lưu thông tin sinh viên vào session
                    setcookie("userName", $maSV, time() + (86400 * 30), "/");
    
                    // Chuyển hướng đến trang chính hoặc danh sách sinh viên
                    header("Location: ?controller=sinhvien&action=index");
                    exit();
                } else {
                    $error = "Mã sinh viên không chính xác!";
                }
            }
    
            // Hiển thị view đăng nhập
            include "./View/Login/login.php"; 
        }

        public function update() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $maSV = $_POST['maSV'];
                $nganhhoc = $_POST['nganhhoc'];
                $hoTen = $_POST['hoTen'];
                $gioiTinh = $_POST['gioiTinh'];
                $ngaySinh = $_POST['ngaySinh'];
                $hinhCu = $_POST['hinhCu'];
        
                // Xử lý hình ảnh
                $hinh = $_FILES['hinh'];
                $targetDir = "content/images/";
                $uploadOk = 1;
        
                // Nếu không có hình mới, giữ lại hình cũ
                if (empty($hinh['name'])) {
                    $targetFile = $hinhCu; // Giữ lại hình cũ
                } else {
                    $targetFile = $targetDir . basename($hinh["name"]);
        
                    // Kiểm tra xem hình ảnh có phải là hình ảnh thực sự không
                    $check = getimagesize($hinh["tmp_name"]);
                    if ($check === false) {
                        echo "Tập tin không phải là hình ảnh.";
                        $uploadOk = 0;
                    }
        
                    // Kiểm tra kích thước hình ảnh
                    if ($hinh["size"] > 500000) { // Giới hạn kích thước 500KB
                        echo "Xin lỗi, hình ảnh của bạn quá lớn.";
                        $uploadOk = 0;
                    }
        
                    // Kiểm tra định dạng hình ảnh
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo "Xin lỗi, chỉ cho phép các định dạng hình ảnh JPG, JPEG, PNG & GIF.";
                        $uploadOk = 0;
                    }
        
                    // Kiểm tra nếu $uploadOk được đặt thành 0 bởi một lỗi
                    if ($uploadOk == 0) {
                        echo "Xin lỗi, hình ảnh của bạn không được tải lên.";
                        return;
                    } else {
                        // Di chuyển tệp hình ảnh mới vào thư mục
                        if (!move_uploaded_file($hinh["tmp_name"], $targetFile)) {
                            echo "Xin lỗi, đã xảy ra lỗi khi tải hình ảnh của bạn.";
                            return;
                        }
                    }
                }
        
                // Cập nhật thông tin sinh viên
                if ($this->SinhVienModel->updateSinhVien($maSV,$nganhhoc, $hoTen, $gioiTinh, $ngaySinh, $targetFile)) {
                    header("Location: ?controller=sinhvien&action=index");
                    exit();
                } else {
                    echo "Có lỗi xảy ra khi cập nhật thông tin sinh viên!";
                }
            } else {
                header("Location: ?controller=sinhvien&action=index");
                exit();
            }
        }
        
    }
?>