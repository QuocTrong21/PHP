<?php include 'app/views/share/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">
                        <i class="bi bi-person-plus me-2"></i>Thêm Sinh Viên Mới
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/BaiKiemTra/Sinhvien/save" 
                          enctype="multipart/form-data" 
                          id="studentForm"
                          novalidate>
                        
                        <div class="mb-3">
                            <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                <input type="text" 
                                       id="MaSV" 
                                       name="MaSV" 
                                       class="form-control" 
                                       required 
                                       pattern="[A-Za-z0-9]+"
                                       title="Chỉ được nhập chữ và số">
                                <div class="invalid-feedback">
                                    Vui lòng nhập mã sinh viên (chỉ chữ và số)
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="HoTen" class="form-label">Họ Tên</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" 
                                       id="HoTen" 
                                       name="HoTen" 
                                       class="form-control" 
                                       required
                                       pattern="^[A-Za-zÀ-ỹ\s]+$"
                                       title="Chỉ được nhập chữ cái">
                                <div class="invalid-feedback">
                                    Vui lòng nhập họ tên (chỉ chữ cái)
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="GioiTinh" class="form-label">Giới Tính</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <select id="GioiTinh" 
                                        name="GioiTinh" 
                                        class="form-select" 
                                        required>
                                    <option value="">Chọn Giới Tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng chọn giới tính
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                <input type="date" 
                                       id="NgaySinh" 
                                       name="NgaySinh" 
                                       class="form-control" 
                                       required
                                       max="<?= date('Y-m-d', strtotime('-16 years')) ?>">
                                <div class="invalid-feedback">
                                    Vui lòng chọn ngày sinh hợp lệ
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Hình Ảnh</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-image"></i></span>
                                <input type="file" 
                                       id="image" 
                                       name="image" 
                                       class="form-control" 
                                       accept="image/*" 
                                       required>
                                <div class="invalid-feedback">
                                    Vui lòng chọn hình ảnh
                                </div>
                            </div>
                            <div id="imagePreview" class="mt-2 text-center"></div>
                        </div>

                        <div class="mb-3">
                            <label for="MaNganh" class="form-label">Ngành</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-book"></i></span>
                                <select id="MaNganh" 
                                        name="MaNganh" 
                                        class="form-select" 
                                        required>
                                    <option value="">Chọn Ngành</option>
                                    <?php foreach ($nganhList as $nganh): ?>
                                        <option value="<?= htmlspecialchars($nganh['MaNganh']) ?>">
                                            <?= htmlspecialchars($nganh['TenNganh']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui lòng chọn ngành
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <button type="submit" class="btn btn-primary flex-grow-1 me-md-2">
                                <i class="bi bi-save me-1"></i>Lưu Sinh Viên
                            </button>
                            <a href="/BaiKiemTra/Sinhvien/list" class="btn btn-secondary flex-grow-1">
                                <i class="bi bi-arrow-left me-1"></i>Quay Lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <img src="${e.target.result}" 
                         class="img-fluid rounded" 
                         style="max-height: 200px;" 
                         alt="Hình ảnh xem trước">
                `;
            }
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    });

    // Form validation
    const form = document.getElementById('studentForm');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});
</script>

<?php include 'app/views/share/footer.php'; ?>