<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Product;
use App\Models\Package;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class IndexControllar extends Controller
{
    public function index()
    {

        $settings = Setting::checkSettings();
        $categories = Category::with('children')->where('parent' , 0)->orWhere('parent' , null)->get();
        $lastFiveProducts = Product::with('category','user')->orderBy('id');

        $packages = Package::with('products')->limit(3)->get();


        View()->share([
            'setting'=>$settings,
            'categories'=>$categories,
            'lastFiveProducts'=>$lastFiveProducts,
            'packages' => $packages,
        ]);
         $categories_with_products = Category::with(['products'])->get();
       return view('index' , compact('settings'));

    }


    public function contact(ContactRequest $request){
        if(!empty($request->ckb)){
            dd("DIE BOT !");
        }
        $json = file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR'].'?fields=status,message,continent,country,countryCode,region,regionName,city,zip,timezone,currency,proxy,query');
$info = json_decode($json, true);
if($info['status'] == 'success'){

$proxy = ($info['proxy'] == '1') ? 'Proxy is On':'No Proxy';
$ip = ''.$info['country'].' » '.$info['regionName'].' » '.$info['city'].' » '.$proxy;
}else{
$ip = ''.$info['status'].' » '.$info['message'].' » '.$info['query'];

}

      $telegramMsg = "
  ————(  رسالة من الموقع )———— \n
  .\n
  🔸الإسم: $request->name \n
  🔸البريد الإلكتروني: $request->email \n
  🔸الموضوع \n $request->subject  \n
  🔸الرسالة: \n $request->msg  \n
  🔸اللوكيشن: \n $ip\n
  .\n
  ————(  رسالة من الموقع )———— \n
  ";


   $uhd = $this->sendMessage($telegramMsg);
   return redirect()->back()->with('message', 'شكرا لكم , سيتم التواصل معكم');

    }


    public function sendMessage($messaggio) {
    	$token = "5789446360:AAF6knMc8BhoirL9RnfDV-ShZjvj5cAo7AA";
    	$chatID = '-808926668';

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

}
