<?php include 'app/views/share/header.php'; ?>
<div class="container mt-5">
    <h2 class="text-center">Danh Sách Học Phần</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã HP</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Đăng Ký</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocPhanList as $hp) : ?>
                <tr>
                    <td><?= $hp['MaHP'] ?></td>
                    <td><?= $hp['TenHP'] ?></td>
                    <td><?= $hp['SoTinChi'] ?></td>
                    <td>
                        <form method="POST" action="index.php?action=dangkyhocphan">
                            <input type="hidden" name="MaSV" value="2180608144"> <!-- Thay bằng session sinh viên -->
                            <input type="hidden" name="MaHP" value="<?= $hp['MaHP'] ?>">
                            <button type="submit" class="btn btn-primary">Đăng Ký</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'app/views/share/footer.php'; ?>
