<?php
$html = file_get_contents('http://flash.weather.com.cn/wmaps/xml/chongqing.xml');
$xmls = simplexml_load_string($html);
foreach ($xmls as $xml){
    echo (string)$xml['cityname']."----".(string)$xml['stateDetailed']."<br>";
}


