<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SessionController extends Controller
{
    //Đọc dữ liệu từ session
        public function nhtgetSessionData(Request $request)
        {
            if($request->session()->has('K23CNT2_NHT'))
            {
                echo "<h2> Session Data:". $request->session()->get("K23CNT2_NHT");
            }
            else
            {
                echo "<h2> Không có dữ liệu trong session </h2>";
            }
        }
    //Ghi dữ liệu vào session
        public function nhtstoreSessionData(Request $request)
        {
            //lưu 
            $request->session()->put('K23CNT2_NHT','K23CNT2 - Nguyễn Huy Thông - 2310900102');
            echo "<h2> Dữ liệu đã được lưu và session </h2>";
        }
    #Xóa dữ liệu trong session
        public function deleteSessionData(Request $request)
        {
            $request->session()->forget('K23CNT2_NHT');
            echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";
        }
}