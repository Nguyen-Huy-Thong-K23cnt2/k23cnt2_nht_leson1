<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SessionController extends Controller
{
    #Đọc dữ liệu từ session
        public function getSessionData(Request $request)
        {
            if($request->session()->has('K23CNT2_NHT'))
            {
                echo $request->session()->get('K23CNT2_NHT');
            }
            else
            {
                echo "<h2> Không có dữ liệu trong session </h2>";
            }
        }
    #Lưu dữ liệu vào session
        public function storeSessionData(Request $request)
        {
            $request->session()->put('name','K23CNT2_NHT');
            echo "<h2> Dữ liệu đã được lưu và session </h2>";
        }
    #Xóa dữ liệu trong session
        public function deleteSessionData(Request $request)
        {
                $request->session()->forget('K23CNT2_NHT');
                echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";
        }
}