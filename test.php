<?php
$xmls=simplexml_load_file("wx");

$toUsername = $xmls->ToUserName; //公众号ID
$fromusername = $xmls->FromUserName;//发送者ID
$content = $xmls->Content;//发送的内容

//得到天气数据
$html = file_get_contents('http://flash.weather.com.cn/wmaps/xml/chongqing.xml');
$xmls = simplexml_load_string($html);
$datas=[];
foreach ($xmls as $xml){
    $datas[(string)$xml['cityname']]=(string)$xml['stateDetailed'].'----'.(string)$xml['tem1'].'/'.(string)$xml['tem2'].'度'."----".(string)$xml['windState'];
}
var_dump($datas);




