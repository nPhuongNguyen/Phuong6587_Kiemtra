<div class="container mt-5">
        <h1 class="text-center">Đăng Nhập Sinh Viên</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <div class="card shadow-lg p-4 mt-4">
            <form method="POST" action="?controller=sinhvien&action=login">
                <div class="mb-3">
                    <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                    <input type="text" class="form-control" id="MaSV" name="MaSV" required>
                </div>
                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </form>
        </div>
    </div>