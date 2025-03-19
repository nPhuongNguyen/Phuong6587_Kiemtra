<?php
// Giả định bạn đã lấy thông tin sinh viên từ cơ sở dữ liệu
// $sv = $sinhVienModel->getSinhVienById($maSV); // Lấy thông tin sinh viên theo mã sinh viên

// Kiểm tra nếu sinh viên tồn tại
if (!$sv) {
    echo "Sinh viên không tồn tại!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Sinh Viên</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css"> <!-- Thay đổi đường dẫn đến Bootstrap -->
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center text-gradient fw-bold">📚 Chi tiết Sinh Viên</h1>

        <div class="card shadow-lg p-4 mt-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php echo htmlspecialchars($sv->Hinh); ?>" alt="Hình sinh viên" class="img-thumbnail" style="width: 200px; height: auto;">
                </div>
                <div class="col-md-8">
                    <h5 class="fw-bold">Họ Tên: <?php echo htmlspecialchars($sv->HoTen); ?></h5>
                    <p><strong>Giới Tính:</strong> <?php echo htmlspecialchars($sv->GioiTinh); ?></p>
                    <p><strong>Ngày Sinh:</strong> <?php echo htmlspecialchars($sv->NgaySinh); ?></p>
                    <p><strong>Mã Sinh Viên:</strong> <?php echo htmlspecialchars($sv->MaSV); ?></p>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="?controller=sinhvien&action=index" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>
                <a href="?controller=Sinhvien&action=edit&MaSv=<?php echo urlencode($sv->MaSV); ?>" class="btn btn-sm btn-outline-primary me-2">
                    <i class="bi bi-pencil me-1"></i> Sửa
                </a>
            </div>
        </div>
    </div>

    <script src="path/to/bootstrap.bundle.min.js"></script> <!-- Thay đổi đường dẫn đến Bootstrap -->
</body>
</html>