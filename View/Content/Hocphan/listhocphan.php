<div class="container py-5">
    <h1 class="text-center fw-bold mb-5 position-relative">
        <span class="text-primary">✨ Danh sách Sinh viên ✨</span>
    </h1>

    <div class="card border-0 shadow rounded-3 overflow-hidden">
        <div class="card-header border-0 py-3 bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded shadow-sm">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="bi bi-people-fill me-2"></i>Quản lý Sinh viên
                </h5>
                
                <a href="?controller=Sinhvien&action=createForm" class="btn btn-success d-flex align-items-center">
                    <i class="bi bi-plus-circle me-2"></i> Thêm Sinh viên mới
                </a>
            </div>

        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 fw-bold">ID</th>
                            <th class="px-4 py-3 fw-bold">Tên học phần</th>
                            <th class="px-4 py-3 fw-bold">Số tín chỉ</th>
                            <th class="px-4 py-3 fw-bold text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($hocphans)): ?>
                            <?php foreach ($hocphans as $hp): ?>
                                <tr class="border-bottom">
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>
                                                <h6 class="fw-bold mb-0 text-primary"><?php echo htmlspecialchars($hp->MaHP); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>
                                                <h6 class="fw-bold mb-0 text-primary"><?php echo htmlspecialchars($hp->TenHP); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                           
                                            <div>
                                                <h6 class="fw-bold mb-0 text-primary"><?php echo htmlspecialchars($hp->SoTinChi); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                  
                                   
                                  
                                    <td class="px-4 py-3 text-center">
                                    <a href="?controller=Sinhvien&action=addToCart&MaHP=<?php echo urlencode($hp->MaHP); ?>"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-pencil me-1"></i> Đăng kí
                                    </a>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div class="py-4">
                                        <i class="bi bi-exclamation-circle text-danger fs-1"></i>
                                        <p class="text-danger fw-bold fs-5 mt-3 mb-0">Không có HP nào</p>
                                        <p class="text-muted">Vui lòng thêm HP mới</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>