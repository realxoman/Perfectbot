<?php
$update = file_get_contents('php://input');
file_put_contents('bot.txt',$update);
$update = json_decode($update, True);
$message = $update['message']['text'];
$chatid = $update['message']['from']['id'];

function sendMessage($chatide,$text,$key){
    $url='https://api.telegram.org/bottoken/sendMessage?chat_id='.$chatide.'&text='.$text.'&reply_markup='.urlencode($key);
    file_get_contents($url);
}

function sendPhoto($chatide,$animation,$key){
    $url='https://api.telegram.org/bottoken/sendAnimation?chat_id='.$chatide.'&animation='.$animation.'&reply_markup='.urlencode($key);
    file_get_contents($url);
}

//sendPhoto('@testbotesi','https://prfct.mahtarik.ir/pftctbt/perfect.mp4');

function key1($text,$data){
    $opt= [
        'text'=>$text,
        'url'=>$data
    ];
    return $opt;
}
function inline(array $opt){
    $reply = [
        'inline_keyboard' => $opt
    ];
    $final_reply = json_encode($reply,TRUE);
    return $final_reply;
}
$step1 = array(
    array(key1('X Changer','https://www.xchanger.ir')),
    array(key1('Ex Novin','https://exnovin.co')),
    array(key1('Pay Order','https://payorder.ir')),
    array(key1('Mihan Pardakht','https://MihanPardakht.net')),
    array(key1('Ex Onyx','https://Exonyx.co'))
);
$step2 = inline($step1);
if (date('H:i') == '12:00'|| date('H:i') == '00:00') {
sendPhoto($chatid,"url",$step2);
}

?>
