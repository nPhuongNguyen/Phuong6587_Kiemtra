<h1 class="text-center text-gradient mt-4 fw-bold">✏️ Chỉnh sửa Sinh Viên</h1>

<div class="container mt-4">
    <div class="card shadow-lg p-4 rounded-4">
        <form method="post" action="?controller=sinhvien&action=update" enctype="multipart/form-data">
            <input type="hidden" name="maSV" value="<?php echo htmlspecialchars($sv->MaSV); ?>">

            <div class="mb-3">
                <label class="form-label fw-semibold">Họ Tên:</label>
                <input type="text" name="hoTen" class="form-control" value="<?php echo htmlspecialchars($sv->HoTen); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Giới Tính:</label>
                <select name="gioiTinh" class="form-control" required>
                    <option value="Nam" <?php echo ($sv->GioiTinh === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo ($sv->GioiTinh === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Ngày Sinh:</label>
                <input type="date" name="ngaySinh" class="form-control" value="<?php echo htmlspecialchars($sv->NgaySinh); ?>" required>
            </div>
            <input type="hidden" name="hinhCu" value="<?php echo htmlspecialchars($sv->Hinh); ?>">
            <div class="mb-3">
                    <label class="form-label fw-semibold">Hình:</label>
                    <div>
                        <img src="<?php echo htmlspecialchars($sv->Hinh); ?>" alt="Hình sinh viên" class="img-thumbnail" style="width: 100px; height: auto;">
                    </div>
                    <input type="file" name="hinh" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Để cập nhật hình ảnh, hãy chọn tệp mới.</small>
                </div>

                <div class="mb-3">
                <label class="fw-bold">Quyền:</label>
                <select name="nganhhoc" class="form-control mb-3">
                    <?php foreach ($nganhhocs as $nganhhoc): ?>
                        <option value="<?php echo $nganhhoc->MaNganh; ?>" 
                            <?php echo ($nganhhoc->MaNganh == $sv->MaNganh) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($nganhhoc->TenNganh); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" name="update" class="btn btn-success px-4">
                    <i class="bi bi-save"></i> Cập nhật
                </button>
                <a href="?controller=sinhvien&action=index" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>
            </div>
        </form>
    </div>
</div>