<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KhoaController extends Controller
{
    //đọc dữ liệu từ bẳng khoa
    public function index()
    {
    // Truy vấn đọc dữ liệu từ bảng khoa
        $nhtkhoas = DB::select('select * from nhtkhoa ');
    //chuyển dữ liệu lên view để hiển thị
        return view('nhtkhoa.nhtlist',['nhtkhoas'=>$nhtkhoas]);
    }
}