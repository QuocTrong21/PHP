<?php include 'app/views/share/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Chỉnh Sửa Sinh Viên</h2>
    
    <form method="POST" action="/BaiKiemTra/Sinhvien/update" enctype="multipart/form-data">
        <input type="hidden" name="MaSV" value="<?= $sinhVien['MaSV']; ?>">

        <div class="mb-3">
            <label class="form-label">Họ Tên:</label>
            <input type="text" name="HoTen" class="form-control" value="<?= $sinhVien['HoTen']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới Tính:</label>
            <select name="GioiTinh" class="form-select">
                <option value="Nam" <?= ($sinhVien['GioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?= ($sinhVien['GioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Sinh:</label>
            <input type="date" name="NgaySinh" class="form-control" value="<?= $sinhVien['NgaySinh']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hình Ảnh:</label>
            <input type="file" name="Hinh" class="form-control">
            <input type="hidden" name="HinhCu" value="<?= $sinhVien['Hinh']; ?>">
            <?php if (!empty($sinhVien['Hinh'])): ?>
                <img src="<?= $sinhVien['Hinh']; ?>" width="100" class="mt-2">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Mã Ngành:</label>
            <select name="MaNganh" class="form-select">
                <?php foreach ($nganhList as $nganh): ?>
                    <option value="<?= $nganh['MaNganh']; ?>" <?= ($sinhVien['MaNganh'] == $nganh['MaNganh']) ? 'selected' : ''; ?>>
                        <?= $nganh['TenNganh']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="/BaiKiemTra/Sinhvien/list" class="btn btn-secondary mt-2">Quay lại danh sách</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'app/views/share/footer.php'; ?>
