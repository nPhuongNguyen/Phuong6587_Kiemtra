
    <h1>Thêm Sinh Viên</h1>
    <form method="POST" action="?controller=sinhvien&action=add" enctype="multipart/form-data">
        <label>Mã Sinh Viên:</label>
        <input type="text" name="maSV" required><br>

        <label>Họ Tên:</label>
        <input type="text" name="hoTen" required><br>

        <label>Giới Tính:</label>
        <select name="gioiTinh" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>

        <label>Ngày Sinh:</label>
        <input type="date" name="ngaySinh" required><br>

        <label>Hình:</label>
        <input type="file" name="hinh" accept="image/*" required><br>

        <div class="mb-3">
            <label for="MaNganh" class="form-label">Ngành:</label>
                <select name="MaNganh" class="form-control mb-3">
                    <?php foreach ($nganhhocs as $nganhhoc): ?>
                        <option value="<?php echo $nganhhoc->MaNganh; ?>">
                            <?php echo htmlspecialchars($nganhhoc->TenNganh); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
        </div>


        <input type="submit" value="Thêm Sinh Viên">
    </form>
