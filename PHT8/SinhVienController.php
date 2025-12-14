<?php

namespace App\Http\Controllers;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
{
// TODO 11: Dùng Eloquent ::all() để lấy toàn bộ sinh viên
$danhSachSV = SinhVien::all();
// TODO 12: Trả về 1 view 'sinhvien.list' và truyền $danhSachSV
 return view('sinhvien.list', compact('danhSachSV'));
}
// Phương thức store() (INSERT)
public function store(Request $request)
{
    // Validate dữ liệu đầu vào
    $validated = $request->validate([
        'ten_sinh_vien' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Tạo sinh viên mới
    SinhVien::create($validated);

    // Chuyển hướng về trang danh sách kèm thông báo
    return redirect()->route('sinhvien.index')->with('success', 'Thêm sinh viên thành công.');
}
}
