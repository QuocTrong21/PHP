<?php include './app/views/share/header.php'; ?>
<div class="container-fluid px-4">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h2 class="mt-3 mb-0">Danh Sách Sinh Viên</h2>
        </div>
        <div class="col-auto">
            <a href="/BAIKIEMTRA/Sinhvien/add" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Thêm Sinh Viên Mới
            </a>
        </div>
    </div>

    <?php if (!empty($sinhViens)) : ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover border">
                <thead class="table-light">
                    <tr>
                        <th>Mã SV</th>
                        <th>Hình Ảnh</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Mã Ngành</th>
                        <th class="text-center">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinhViens as $sv) : ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($sv['MaSV']) ?></strong>
                                <a href="/BAIKIEMTRA/SinhVien/show/<?= $sv['MaSV'] ?>" 
                                   class="btn btn-info btn-sm d-block mt-1">
                                    <i class="bi bi-eye me-1"></i>Chi Tiết
                                </a>
                            </td>
                            <td>
                                <img src="<?= htmlspecialchars($sv['Hinh']) ?>" 
                                     alt="Hình sinh viên <?= htmlspecialchars($sv['HoTen']) ?>" 
                                     class="img-thumbnail" 
                                     style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            </td>
                            <td><?= htmlspecialchars($sv['HoTen']) ?></td>
                            <td>
                                <span class="badge <?= $sv['GioiTinh'] == 'Nam' ? 'bg-primary' : 'bg-pink' ?>">
                                    <?= htmlspecialchars($sv['GioiTinh']) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                            <td><?= htmlspecialchars($sv['MaNganh']) ?></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="/BAIKIEMTRA/SinhVien/edit/<?= $sv['MaSV'] ?>" 
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil me-1"></i>Sửa
                                    </a>
                                    <a href="/BAIKIEMTRA/SinhVien/delete/<?= $sv['MaSV'] ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
                                        <i class="bi bi-trash me-1"></i>Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center" role="alert">
            <i class="bi bi-info-circle me-2"></i>Không có dữ liệu sinh viên
        </div>
    <?php endif; ?>
</div>

<!-- Add these in the header.php file -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .bg-pink {
        background-color: #ff69b4 !important;
    }
    .img-thumbnail {
        transition: transform 0.3s ease;
    }
    .img-thumbnail:hover {
        transform: scale(1.1);
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'app/views/share/footer.php'; ?>