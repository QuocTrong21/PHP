<?php include 'app/views/share/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">
                        <i class="bi bi-lock me-2"></i>Đăng Nhập
                    </h2>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?url=auth/login" method="POST" id="loginForm" novalidate>
                        <div class="mb-3">
                            <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-credit-card"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="MaSV" 
                                       name="MaSV" 
                                       required 
                                       pattern="[A-Za-z0-9]+"
                                       title="Vui lòng nhập mã sinh viên"
                                       placeholder="Nhập mã sinh viên">
                                <div class="invalid-feedback">
                                    Vui lòng nhập mã sinh viên hợp lệ
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Đăng Nhập
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});
</script>

<style>
body {
    background-color: #f4f6f9;
}
.card {
    border-radius: 10px;
}
.card-header {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
</style>

<?php include 'app/views/share/footer.php'; ?>