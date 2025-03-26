<?php include './app/views/share/header.php'; ?>
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Danh Sách Sinh Viên</h2>
        <a href="/BAIKIEMTRA/Sinhvien/add" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Thêm Sinh Viên Mới
        </a>
    </div>

    <?php if (!empty($sinhViens)) : ?>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">Mã SV</th>
                            <th class="px-4 py-3 text-left">Hình Ảnh</th>
                            <th class="px-4 py-3 text-left">Họ Tên</th>
                            <th class="px-4 py-3 text-left">Giới Tính</th>
                            <th class="px-4 py-3 text-left">Ngày Sinh</th>
                            <th class="px-4 py-3 text-left">Mã Ngành</th>
                            <th class="px-4 py-3 text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sinhViens as $sv) : ?>
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-4 py-3">
                                    <div class="flex flex-col">
                                        <strong class="text-gray-800"><?= htmlspecialchars($sv['MaSV']) ?></strong>
                                        <a href="/BAIKIEMTRA/SinhVien/show/<?= $sv['MaSV'] ?>" 
                                           class="text-blue-500 hover:text-blue-700 text-sm mt-1 transition">
                                            Chi Tiết
                                        </a>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <img src="<?= htmlspecialchars($sv['Hinh']) ?>" 
                                         alt="Hình sinh viên <?= htmlspecialchars($sv['HoTen']) ?>" 
                                         class="w-16 h-16 object-cover rounded-full shadow-md transform hover:scale-110 transition">
                                </td>
                                <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($sv['HoTen']) ?></td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        <?= $sv['GioiTinh'] == 'Nam' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' ?>">
                                        <?= htmlspecialchars($sv['GioiTinh']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-600"><?= htmlspecialchars($sv['NgaySinh']) ?></td>
                                <td class="px-4 py-3 text-gray-800"><?= htmlspecialchars($sv['MaNganh']) ?></td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="/BAIKIEMTRA/SinhVien/edit/<?= $sv['MaSV'] ?>" 
                                           class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                                            Sửa
                                        </a>
                                        <a href="/BAIKIEMTRA/SinhVien/delete/<?= $sv['MaSV'] ?>"
                                           class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
                                            Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else : ?>
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded" role="alert">
            <p class="font-bold">Thông Báo</p>
            <p>Không có dữ liệu sinh viên</p>
        </div>
    <?php endif; ?>
</div>

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<?php include 'app/views/share/footer.php'; ?>