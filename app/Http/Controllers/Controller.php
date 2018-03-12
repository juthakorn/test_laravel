<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $province = array(
        '' => '--- กรุณาเลือกจังหวัด ---',
        "กระบี่" => "กระบี่",
        "กรุงเทพมหานคร" => "กรุงเทพมหานคร",
        "กาญจนบุรี" => "กาญจนบุรี",
        "กาฬสินธุ์" => "กาฬสินธุ์",
        "กำแพงเพชร" => "กำแพงเพชร",
        "ขอนแก่น" => "ขอนแก่น",
        "จันทบุรี" => "จันทบุรี",
        "ฉะเชิงเทรา" => "ฉะเชิงเทรา",
        "ชลบุรี" => "ชลบุรี",
        "ชัยนาท" => "ชัยนาท",
        "ชัยภูมิ" => "ชัยภูมิ",
        "ชุมพร" => "ชุมพร",
        "เชียงราย" => "เชียงราย",
        "เชียงใหม่" => "เชียงใหม่",
        "ตรัง" => "ตรัง",
        "ตราด" => "ตราด",
        "ตาก" => "ตาก",
        "นครนายก" => "นครนายก",
        "นครปฐม" => "นครปฐม",
        "นครพนม" => "นครพนม",
        "นครราชสีมา" => "นครราชสีมา",
        "นครศรีธรรมราช" => "นครศรีธรรมราช",
        "นครสวรรค์" => "นครสวรรค์",
        "นนทบุรี" => "นนทบุรี",
        "นราธิวาส" => "นราธิวาส",
        "น่าน" => "น่าน",
        "บึงกาฬ" => "บึงกาฬ",
        "บุรีรัมย์" => "บุรีรัมย์",
        "ปทุมธานี" => "ปทุมธานี",
        "ประจวบคีรีขันธ์" => "ประจวบคีรีขันธ์",
        "ปราจีนบุรี" => "ปราจีนบุรี",
        "ปัตตานี" => "ปัตตานี",
        "พะเยา" => "พะเยา",
        "พังงา" => "พังงา",
        "พัทลุง" => "พัทลุง",
        "พิจิตร" => "พิจิตร",
        "พิษณุโลก" => "พิษณุโลก",
        "เพชรบุรี" => "เพชรบุรี",
        "เพชรบูรณ์" => "เพชรบูรณ์",
        "แพร่" => "แพร่",
        "ภูเก็ต" => "ภูเก็ต",
        "มหาสารคาม" => "มหาสารคาม",
        "มุกดาหาร" => "มุกดาหาร",
        "แม่ฮ่องสอน" => "แม่ฮ่องสอน",
        "ยโสธร" => "ยโสธร",
        "ยะลา" => "ยะลา",
        "ร้อยเอ็ด" => "ร้อยเอ็ด",
        "ระนอง" => "ระนอง",
        "ระยอง" => "ระยอง",
        "ราชบุรี" => "ราชบุรี",
        "ลพบุรี" => "ลพบุรี",
        "ลำปาง" => "ลำปาง",
        "ลำพูน" => "ลำพูน",
        "เลย" => "เลย",
        "ศรีสะเกษ" => "ศรีสะเกษ",
        "สกลนคร" => "สกลนคร",
        "สงขลา" => "สงขลา",
        "สตูล" => "สตูล",
        "สมุทรปราการ" => "สมุทรปราการ",
        "สมุทรสงคราม" => "สมุทรสงคราม",
        "สมุทรสาคร" => "สมุทรสาคร",
        "สระแก้ว" => "สระแก้ว",
        "สระบุรี" => "สระบุรี",
        "สิงห์บุรี" => "สิงห์บุรี",
        "สุโขทัย" => "สุโขทัย",
        "สุพรรณบุรี" => "สุพรรณบุรี",
        "สุราษฎร์ธานี" => "สุราษฎร์ธานี",
        "สุรินทร์" => "สุรินทร์",
        "หนองคาย" => "หนองคาย",
        "หนองบัวลำภู" => "หนองบัวลำภู",
        "อยุธยา" => "อยุธยา",
        "อ่างทอง" => "อ่างทอง",
        "อำนาจเจริญ" => "อำนาจเจริญ",
        "อุดรธานี" => "อุดรธานี",
        "อุตรดิตถ์" => "อุตรดิตถ์",
        "อุทัยธานี" => "อุทัยธานี",
        "อุบลราชธานี" => "อุบลราชธานี");
    
    
    function get_group_product($param) {        
        $return = NULL;
        switch ($param) {
            case "best_sell":
                $return = Product::where('p_best_sell',1)->inRandomOrder()->take(5)->get();
                break;
            case "p_new":
                $return = Product::where('p_new',1)->inRandomOrder()->take(4)->get();
                break;
            case "recommend":
                $return = Product::where('p_recommend',1)->inRandomOrder()->take(10)->get();
                break;
        }
        return $return;
    }
    
    
    
    
    
    




}
