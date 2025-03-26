<?php include 'app/views/share/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Thông Tin Chi Tiết Sinh Viên</h2>
                </div>
                <div class="card-body position-relative">
                    <div class="profile-image-container text-center position-absolute top-0 start-50 translate-middle">
                        <div class="rounded-circle bg-light shadow-sm d-flex align-items-center justify-content-center" 
                             style="width: 150px; height: 150px; overflow: hidden;">
                            <?php 
                            $imagePath = $sinhVien['Hinh'] ? 'imgae/' . $sinhVien['Hinh'] : 'imgae/sv.ipeg';
                            ?>
                            <img src="<?= $imagePath ?>" 
                                 class="img-fluid" 
                                 style="width: 100%; height: 100%; object-fit: cover;"
                                 alt="Ảnh sinh viên"
                                 onerror="this.src='image/default.png'; this.onerror=null;">
                        </div>
                    </div>

                    <div class="student-details mt-5 pt-5">
                        <div class="detail-row mb-3">
                            <div class="text-muted small">MÃ SINH VIÊN</div>
                            <div class="fs-5"><?= $sinhVien['MaSV']; ?></div>
                        </div>

                        <div class="detail-row mb-3">
                            <div class="text-muted small">HỌ TÊN</div>
                            <div class="fs-5"><?= $sinhVien['HoTen']; ?></div>
                        </div>

                        <div class="detail-row mb-3">
                            <div class="text-muted small">GIỚI TÍNH</div>
                            <div class="fs-5"><?= $sinhVien['GioiTinh']; ?></div>
                        </div>

                        <div class="detail-row mb-3">
                            <div class="text-muted small">NGÀY SINH</div>
                            <div class="fs-5"><?= date('d/m/Y', strtotime($sinhVien['NgaySinh'])); ?></div>
                        </div>

                        <div class="detail-row mb-3">
                            <div class="text-muted small">NGÀNH HỌC</div>
                            <div class="fs-5">
                                <?php
                                foreach ($nganhList as $nganh) {
                                    if ($nganh['MaNganh'] == $sinhVien['MaNganh']) {
                                        echo $nganh['TenNganh'];
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="list.php" class="btn btn-secondary">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.detail-row {
    border-bottom: 1px solid #f1f3f5;
    padding-bottom: 10px;
}
.detail-row:last-child {
    border-bottom: none;
}
.profile-image-container {
    z-index: 10;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Image path: <?= $imagePath ?>');
});
</script>

<?php include 'app/views/share/footer.php'; ?>