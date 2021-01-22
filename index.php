<?php
ob_start();
define('API_KEY','1463150689:AAE54hAGPKcoFCdkw7FB0IDXGSuGGKdoXxQ');
ini_set("log_errors" , "off");
//-------
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$admin = array(1119653364,1390815208); 
$channel_logs = "-1001191987781";
$rpto = $update->message->reply_to_message->forward_from->id;
$URL = "https://metiwolf.pandamizban.ir/c";
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $user["step"];
$cinvite = $user["invite"];
$createfree = $user["createfree"];
$createbot = $user["createbot"];
$type = $user["type"];
$yourbotsaz = $user["yourbotsaz"];
$freebots = file_get_contents("data/freebots.txt");
$vipbots = file_get_contents("data/vipbots.txt");
$listban = file_get_contents("banlist.txt");
$Member = file_get_contents("data/members.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@GoldenCreate&user_id=".$chat_id));
$tch = $forchaneel->result->status;
//------
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
			if(strpos($listban, "$from_id") !== false ){
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"بلاک شدی بای بدع",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  ]); 
exit();
}
//------
if(strpos($textmessage=="/start") !== false  && $textmessage !=="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "none";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$invite = $user1["invite"];
settype($invite,"integer");
$newinvite = $invite + 1;
$user1["invite"] = $newinvite;
$outjson = json_encode($user1,true);
file_put_contents("data/$id.json",$outjson);
					 bot('sendMessage',[
                    'chat_id'=>$id,
'text'=>"🎗کاربر @$username با استفاده از لینک شما وارد ربات شد و شما امتیاز گرفتید",
                   'parse_mode'=>"HTML",
	                      ]);
						
					}
					}
//--------
if (!file_exists("data/$from_id.json")) {
        $myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
		 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    }

//---    
if(strpos($textmessage,"'") !== false or strpos($textmessage,'"') !== false or strpos($textmessage,"}") !== false or strpos($textmessage,"{") !== false or strpos($textmessage,")'") !== false or strpos($textmessage,"(") !== false or strpos($textmessage,",") !== false){ 
$addus= $from_id."\n";
file_put_contents("banlist.txt", $addus);
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"گزارش هک به ادمین ارسال شد✔️",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  ]); 
  bot('sendMessage',[
 'chat_id'=>1390815208,
 'text'=>"
جنازه یک هڪر به خاک سپرده شد💉
user info
- - - - - - - - - - - - - - - - -
name : $first_name
- - - - - - - - - - - - - - - - -
user name : @$username
- - - - - - - - - - - - - - - - -
id : $from_id
- - - - - - - - - - - - - - - - -
code :
- - - - - - - - - - - - - - - - -
$textmessage
- - - - - - - - - - - - - - - - -
",
 'parse_mode'=>"MarkDown",
  ]); 
 }
 //----
	if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
		 bot('sendMessage',[
                    'chat_id'=>$chat_id,
                    'text'=>"برای استفاده از ربات و حمایت از ما در کانال زیر عضو شوید و سپس تایید عضویت را بزنید👇
🔸 @GoldenCreate    🔸 @GoldenCreate
👇 بعد از « عضــویت » ربات را استارت کنید👇",
                   'parse_mode'=>"HTML",
]); 
}else{
	if($textmessage == "/start" or $textmessage == "◼️بازگشت◼️"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🚦باسلام دوست عزیز به سرویس رباتساز هوشمند #گلدن_کریت خوش امدید.
✨انتخاب کنید.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    [['text'=>"🎗ساخت ربات ساز"]],
	[['text'=>"✨آپدیت ربات ساز"],['text'=>"♥️حذف ربات ساز"]],
	[['text'=>"💫ارتقای حساب"],['text'=>"🎗اسپانسر"],['text'=>"◼️پشتیبانی"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
	}
	//---
	elseif($textmessage == "◼️پشتیبانی"){
		  $user["step"] = "support";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
		  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🌼پیامتو وارد کن",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
	  }
	   elseif($step == "support" and $textmessage != "◼️بازگشت◼️"){
		    bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"منتظر پاسخ باشید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
		   bot('ForwardMessage',[
	'chat_id'=>$admin,
	'from_chat_id'=>$from_id,
	'message_id'=>$message_id
	]);
	   }
	   elseif($rpto != "" && $chat_id == $admin){
     bot('sendMessage',[
 'chat_id'=>$rpto,
 'text'=>"🚦پیام مدیریت:
$textmessage",
 'parse_mode'=>"HTML",
	 ]);
	      bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام شما به فرد ارسال شد✔️",
 'parse_mode'=>"HTML",
	 ]);
    }
	 //---
	  elseif($textmessage == "🎗اسپانسر"){
		  $user["step"] = "support";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
		  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🙏🏻 با پاندا میزبان خدمات یک هاستینگ خوب را تجربه کنید 🌹
🔊 امکانات هر 1 گیگابایت هاست :
📌 پهنای باند : نامحدود
📌 کنترل پنل : سیپنل
📌 گواهینامه ssl : رایگان
📌 ساب دامنه رایگان : دارد
📌 دامنه اضافه : نامحدود
📌 تعداد دیتابیس : نامحدود
📌 پشتیبانی ربات میدلاین : بله
📌 لوکیشن : هلند
📌 دیتاسنتر : هلند
💳 قیمت : 6 هزار تومن 😍
[🇮🇷] دارای نماد اعتماد 
جهت خرید وارد سایت ما شوید 🌹
جهت خرید ارزان با قیمت گیگی 6 هزارتومن به پشتیبانی مراجعه فرمائید 🙏🏻
🌐 سایت [ PandaMizban.ir ]
🔊 کانال [ @pandahost ]",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
	  }
	   elseif($step == "support" and $textmessage != "◼️بازگشت◼️"){
		    bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"️❗️دستور نامشخص ؛ از دکمه ها استفاده کنید.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
		   bot('ForwardMessage',[
	'chat_id'=>$admin,
	'from_chat_id'=>$from_id,
	'message_id'=>$message_id
	]);
	   }
	   elseif($rpto != "" && $chat_id == $admin){
     bot('sendMessage',[
 'chat_id'=>$rpto,
 'text'=>"دوست عزیز شما یک پیام از طرف پشتیبانی ربات دریافت کردید✔️
------------------------------
$textmessage",
 'parse_mode'=>"HTML",
	 ]);
	      bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام شما به فرد ارسال شد✔️",
 'parse_mode'=>"HTML",
	 ]);
       
    }
	 //---
	 elseif($textmessage == "💫ارتقای حساب"){
		 if($type == "vip"){
			 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"حساب شما در ربات ساز ویژه است❗",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		 }else{
		 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"■ لطفا جهت ویژه کردن حساب خود یک بخش را انتخاب نمایید.",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"زیرمجموعه گیری👥"],['text'=>"💎خرید حساب"]],
[['text'=>"📌تعداد زیرمجموعه های من📋"],['text'=>"ویژه کردن ⚡️"]],
[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);    
		 }
	 }
	 //-----------
	 elseif($textmessage == "💎خرید حساب"){
	     if($type == "vip"){
	         bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"حساب شما در ربات ساز ویژه است❗",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		 }else{
	 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"برای خرید حساب ویژه میتوانید به ربات زیر پیام دهید👇
@metiym 🗣",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);
	 }
	 }
	 //--------------
	  elseif($textmessage == "زیرمجموعه گیری👥"){
	$username = $message->from->username;
$pic="$URL/PBaner.png";
bot('SendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$pic,
'caption'=>"رباتساز جدید گلدن ڪریت! 🤠
ساخت رباتساز و ربات هاے بدون باگ ! 💣
سرعت عالے 🧨
با پنلے شیک ⚙
با ما بهترین رباتساز را بسازید! ;)))
https://t.me/GoldenCreatebot?start=$from_id",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🍄 بنر بالا مخصوص شما طراحی شده.
🐚آنرا بردارید و پخش کنید که بقیه با لینک شما وارد ربات شوند و شما امتیاز کسب کنید.
🍿تعداد امتیاز برای ویژه شدن : 25",
]);
}
	 //---
	 if($textmessage == "📌تعداد زیرمجموعه های من📋" || $textmessage == "/setvip"){
	         bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"مقدار امتیاز شما از زیرمجموعه گیری برابر : $cinvite",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		 }
		 //----
		 elseif($textmessage == "ویژه کردن ⚡️"){
		  if($type == "vip"){
	         bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"حساب شما در ربات ساز ویژه است❗",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		 }else{
		     if($cinvite >= "25"){
$user1 = json_decode(file_get_contents("data/$from_id.json"),true);
$user1["type"] = "vip";
$invite = $user1["invite"];
settype($invite,"integer");
$newinvite = $invite - 25;
$user1["invite"] = $newinvite;
$outjson1 = json_encode($user1,true);
file_put_contents("data/$from_id.json",$outjson1);
bot('sendMessage',[
 'chat_id'=>$from_id,
 'text'=>"🐝 حساب شما ویژه شد.",
 'parse_mode'=>"HTML",
]); 
	 	 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"حساب ویژه شد❗️
آیدی عددی :
$from_id
ادمین ربات ساز :
[$from_id](tg://user?id=$from_id)",
 'parse_mode'=>"MarkDown",
	 ]);
		     }else{
		       bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"25 تا امتیاز میخای امتیازت کمه گلم🥲!",
 'parse_mode'=>"MarkDown",
	 ]);
		     }
		 }
		 }
	 //---
	 elseif($textmessage == "✨آپدیت ربات ساز"){
		 if($type == "vip"){
			  $user["step"] = "updatebotsaz";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🏮توکن ربات تونو از @botfather بفرستید",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
	 }else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📛 شما هنوز رباتی نساخته اید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);   
	 }
	 }
	 elseif($step == "updatebotsaz" and $textmessage != "◼️بازگشت◼️"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == "1" && (file_exists("Bots/BotSaz/$un/index.php")) && $un == $yourbotsaz){
		 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	file_get_contents("$URL/BotSazSazApi.php?token=$textmessage&id=$from_id&type=update");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"◽️ربات شما به آخرین نسخه ارتقاع یافت
🖲 @$un",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
	 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"ربات ساز آپدیت شد❗️
آیدی ربات ساز :
@$un
ادمین ربات ساز :
[$first_name](tg://user?id=$chat_id)",
 'parse_mode'=>"MarkDown",
	 ]);  
}else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"💢لطفا توکن معتبری بفرستید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
}
}
	 //---
	 elseif($textmessage == "♥️حذف ربات ساز"){
		 if($type == "vip"){
			  $user["step"] = "deletebotsaz";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🏮توکن ربات تونو از @botfather بفرستید",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
	 }else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"📛 شما هنوز رباتی نساخته اید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);   
	 }
	 }
		 elseif($step == "deletebotsaz" and $textmessage != "◼️بازگشت◼️"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == "1" && (file_exists("Bots/BotSaz/$un/index.php")) && $un == $yourbotsaz){
	file_get_contents("$URL/BotSazSazApi.php?token=$textmessage&id=$from_id&type=delete");
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"◾️ ربات موردنظر حذف شد ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
	 	 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"ربات ساز حذف شد❗️
آیدی ربات ساز :
@$un
ادمین ربات ساز :
[$first_name](tg://user?id=$chat_id)",
 'parse_mode'=>"MarkDown",
	 ]);  
	 $vipbots = file_get_contents("data/vipbots.txt");
                    settype($vipbots,"integer");
                      $newbots = $vipbots - 1;
                       file_put_contents("data/vipbots.txt",$newbots);
	 $user["step"] = "none";
	 $user["createbot"] = "none";
	 $user["yourbotsaz"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}else{
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"💢لطفا توکن معتبری بفرستید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
}
}
	 //---
	 elseif($textmessage == "🎗ساخت ربات ساز"){
		 if($type == "vip" and $createbot == "true"){
			 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🔸شما قبلا ربات تونو ساخته اید ...
⚜ @$yourbotsaz",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		 }
		if($type == "vip"){
			if($createbot != "true"){
			$user["step"] = "createbot";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"🏮توکن ربات تونو از @botfather بفرستید",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]);  
		}
	}else{
			bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"💣حساب شما برای ساخت رباتساز ویژه نیست ،برای معلومات بیشتر به قسمت [☔️جزئیات بیشتر] مراجعه کنید .",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
		}
	}
	elseif($step == "createbot" and $textmessage != "◼️بازگشت◼️"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == "1" && (!file_exists("Bots/BotSaz/$un/index.php"))){
	 $vipbots = file_get_contents("data/vipbots.txt");
                    settype($vipbots,"integer");
                      $newbots = $vipbots + 1;
                       file_put_contents("data/vipbots.txt",$newbots);
		$user["step"] = "none";
		$user["createbot"] = "true";
		$user["yourbotsaz"] = $un;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	file_get_contents("$URL/BotSazSazApi.php?token=$textmessage&id=$from_id&type=create");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"◼️ربات ساز شما با موفقیت ساخته شد.
🔖 @$un",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
	 ]);  
	 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"ربات ساز ساخته شد❗️
نوع حساب : ویژه
آیدی ربات ساز :
@$un
ادمین ربات ساز :
[$first_name](tg://user?id=$chat_id)",
 'parse_mode'=>"MarkDown",
	 ]);  
}else{
	 $user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"💢لطفا توکن معتبری بفرستید ...",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
}}
//-----admin-panel-----
elseif($textmessage == "▪️بازگشت به منوی مدیریت▪️" or $textmessage == "پنل" or $textmessage == "/panel"){
	if($chat_id == $admin ){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"مدیر گرامی به پنل مدیریت ربات ساز خوش آمدید😊",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  'reply_markup'=>json_encode([
           'keyboard'=>[
    [['text'=>"⚙ جزئیات 🔩"]],
    [['text'=>"ویژه✔️"],['text'=>"✖️لغو"]],
    [['text'=>"🧾 شماره کاربر 🧾"]],
    [['text'=>"ارسال🔹"],['text'=>"🔹فروارد"]],
    [['text'=>"■ شارژ ربات ساز ■"]],
	[['text'=>"◼️بازگشت◼️"]],
	],
		"resize_keyboard"=>true,
	 ])
	 ]); 
}else{
		bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"شما دسترسی به بخش مدیریت را ندارید!",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]); 
}
}
//---
elseif($chat_id == $admin and $textmessage == "⚙ جزئیات 🔩"){	
$alluser = file_get_contents("data/members.txt");
	$alaki = explode("\n",$alluser);
    $allusers = count($alaki)-1;
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"👤تعداد کل اعضای ربات : $allusers
🔩تعداد ربات های ویژه : $vipbots
🔩تعداد ربات های رایگان : $freebots",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
]); 
}
//---
elseif($chat_id == $admin and $textmessage == "ویژه✔️"){	
$user["step"] = "set-vip-user";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"آیدی عددی فرد رو برای ویژه کردن ارسال کنید :",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
elseif($chat_id == $admin and $textmessage != "▪️بازگشت به منوی مدیریت▪️" and $step == "set-vip-user"){
	if(file_exists("data/$textmessage.json")) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$textmessage.json"),true);
$user1["type"] = "vip";
$outjson1 = json_encode($user1,true);
file_put_contents("data/$textmessage.json",$outjson1);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"کاربر مورد نظر با موفقیت ویژه شد✔️
پروفایل فرد :
[$textmessage](tg://user?id=$textmessage)",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]); 
bot('sendMessage',[
 'chat_id'=>$textmessage,
 'text'=>"حساب شما با موفقیت توسط مدیران ربات ویژه شد🌹
ازین پس میتوانید ربات ساز شخصی خود را داشته باشید😃
با تشکر از خرید شما😊",
 'parse_mode'=>"HTML",
]); 
	 	 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"حساب ویژه شد❗️
آیدی عددی :
$textmessage
ادمین ربات ساز :
[$textmessage](tg://user?id=$textmessage)",
 'parse_mode'=>"MarkDown",
	 ]);
}else{
	bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"کاربر مورد نظر در ربات وجود ندارد!❌",
 'parse_mode'=>"HTML",
]); 
}
}
//---
elseif($chat_id == $admin and $textmessage == "✖️لغو"){	
$user["step"] = "off-vip-user";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"برای رایگان کردن حساب فرد آیدی عددی فرد مورد نظر را ارسال کنید➰",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
      'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
elseif($chat_id == $admin and $textmessage != "▪️بازگشت به منوی مدیریت▪️" and $step == "off-vip-user"){
	if(file_exists("data/$textmessage.json")) {
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$textmessage.json"),true);
$user1["type"] = "none";
$outjson1 = json_encode($user1,true);
file_put_contents("data/$textmessage.json",$outjson1);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"کاربر مورد نظر با موفقیت رایگان شد✔️
پروفایل فرد :
[$textmessage](tg://user?id=$textmessage)",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]); 
bot('sendMessage',[
 'chat_id'=>$textmessage,
 'text'=>"حساب شما توسط مدیران ربات ساز رایگان شد😄",
 'parse_mode'=>"HTML",
]); 
 bot('sendMessage',[
 'chat_id'=>$channel_logs,
 'text'=>"حساب رایگان شد❗️
آیدی عددی :
$textmessage
ادمین ربات ساز :
[$textmessage](tg://user?id=$textmessage)",
 'parse_mode'=>"MarkDown",
	 ]);
}else{
	bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"کاربر مورد نظر در ربات وجود ندارد!❌",
 'parse_mode'=>"HTML",
]); 
}
}
//---
elseif($chat_id == $admin and $textmessage == "ارسال🔹"){	
$user["step"] = "send2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام خود را برای ارسال همگانی ارسال نمایید✔",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
elseif($chat_id == $admin && $step == "send2all" && $textmessage != "▪️بازگشت به منوی مدیریت▪️"){ 
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    $all_member = fopen( "data/members.txt", 'r');
	while( !feof( $all_member)) {
 	$user = fgets( $all_member);
  bot('sendMessage',[
 'chat_id'=>$user,
 'text'=>$textmessage,
 'parse_mode'=>"MarkDown",
  ]);
}
  bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام همگانی با موفقیت به همه اعضا ارسال شد✔️",
 'parse_mode'=>"MarkDown",
  ]);
}
//----
elseif($chat_id == $admin and $textmessage == "🔹فروارد"){
	$user["step"] = "f2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"پیام خود را برای فروارد همگانی فروارد نمایید➡",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]); 
}
elseif($textmessage != "▪️بازگشت به منوی مدیریت▪️" && $from_id == $admin && $step == "f2all"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
    $all_member = fopen( "data/members.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
		   bot('ForwardMessage',[
	'chat_id'=>$user,
	'from_chat_id'=>$admin,
	'message_id'=>$message_id
	]);
		}    
		bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"فروارد همگانی به همه اعضای ربات فروارد شد✔️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]); 
}
//---
elseif($chat_id == $admin and $textmessage == "🧾 شماره کاربر 🧾"){	
$user["step"] = "getnumber";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"✔برای دریافت شما کاربر آیدی عددی فرد را ارسال کنید :",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]); }
elseif($chat_id == $admin and $textmessage != "▪️بازگشت به منوی مدیریت▪️" && $step == "getnumber"){
	if(file_exists("data/$textmessage.json")){
		$user1 = json_decode(file_get_contents("data/$textmessage.json"),true);
$number1 = $user1["number"];
bot('sendContact',[
 'chat_id'=>$admin,
 'phone_number'=>$number1,
 'first_name'=>"شماره فرد",
  'reply_to_message_id'=>$message_id,
]); 
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"شماره فرد ارسال شد😄
پروفایل فرد :
[$textmessage](tg://user?id=$textmessage)",
 'parse_mode'=>"MarkDown",
]);
}
}		
elseif($chat_id == $admin and $textmessage == "■ شارژ ربات ساز ■"){
$user["step"] = "charge";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"برای شارژ ربات ساز آیدی ربات ساز رو بدون @ ارسال کنید😄",
 'parse_mode'=>"MarkDown",
     'reply_markup'=>json_encode([
           'keyboard'=>[
	[['text'=>"▪️بازگشت به منوی مدیریت▪️"]],
	],
		"resize_keyboard"=>true,
	 ])
]);
}
elseif($chat_id == $admin and $textmessage != "▪️بازگشت به منوی مدیریت▪️" && $step == "charge"){
if(file_exists("Bots/BotSaz/$textmessage/index.php")){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"ربات ساز مورد نظر برای ساخت 1 عدد ربات ساز شارژ شد!",
 'parse_mode'=>"MarkDown",
]);
$settings = json_decode(file_get_contents("Bots/BotSaz/$textmessage/data/settings.json"),true);
$sellbotsaz = $settings["sellbotsaz"];
$new = $sellbotsaz + 1;
$settings["sellbotsaz"] = $new;
$outjson1 = json_encode($settings,true);
file_put_contents("Bots/BotSaz/$textmessage/data/settings.json",$outjson1);
}else{
  bot('sendMessage',[
 'chat_id'=>$admin,
 'text'=>"ربات ساز مورد نظر یافت نشد!",
 'parse_mode'=>"MarkDown",
]);  
    
}
}
}
unlink('error_log');
?>
