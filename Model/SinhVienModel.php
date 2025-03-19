<?php
Class SinhVienModel{
    private $conn;
    private $table_name = "sinhvien";
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllSinhViens() {
        $query = "SELECT sv.MaSV, sv.HoTen, sv.GioiTinh, sv.NgaySinh, sv.Hinh, n.TenNganh
                  FROM " . $this->table_name . " sv
                  JOIN nganhhoc n ON sv.MaNganh = n.MaNganh";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getById($MaSV) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":MaSV", $MaSV, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function deleteSinhVien($maSV) {
        $query = "DELETE FROM sinhvien WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);

        return $stmt->execute(); // Trả về true nếu xóa thành công, false nếu thất bại
    }


    public function addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "INSERT INTO " . $this->table_name . " (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                  VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
    
        $stmt = $this->conn->prepare($query);
    
        // Ràng buộc tham số
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);
    
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true; // Thêm thành công
        }
        return false; // Thêm thất bại
    }

    public function checkMaSV($maSV) {
        $query = "SELECT * FROM sinhvien WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();

        return $stmt->rowCount() > 0; 
    }

    public function updateSinhVien($maSV,$nganhhoc, $hoTen, $gioiTinh, $ngaySinh, $hinh) {
        $query = "UPDATE sinhvien SET HoTen = :hoTen,MaNganh =:nganhhoc ,GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':nganhhoc', $nganhhoc);
        $stmt->bindParam(':hinh', $hinh);

        return $stmt->execute(); // Trả về true nếu thành công, false nếu thất bại
    }
    
    
      
}
?>