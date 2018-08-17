<?php
//打通微信
//echo $_GET["echostr"];
//得到微信服务器发送过来的数据
$contents = file_get_contents('php://input');
//调试信息
file_put_contents('wx', $contents);
//把xml 转化成对象
$xmls = simplexml_load_string($contents);
//取出数据
$toUsername = $xmls->ToUserName; //公众号ID
$fromusername = $xmls->FromUserName;//发送者ID
$content = $xmls->Content;//发送的内容
//得到天气数据
$html = file_get_contents('http://flash.weather.com.cn/wmaps/xml/chongqing.xml');
$xmls = simplexml_load_string($html);
$citys=[];
foreach ($xmls as $xml){
    $citys[]=(string)$xml['cityname'];
   $datas[(string)$xml['cityname']]=(string)$xml['stateDetailed'].'----'.(string)$xml['tem1'].'/'.(string)$xml['tem2'].'度'."----".(string)$xml['windState'];
}

//开启ob缓存
ob_start();
if($content=='美女'){
    $girls=[
        [
            'title'=>'1号美女',
            'des'=>'美女',
            'pic'=>'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1534507909382&di=945e2b55ddf3168936e58ff497cf338f&imgtype=0&src=http%3A%2F%2Fimg3.xiazaizhijia.com%2Fwalls%2F20160408%2F1024x768_b80c3129c9d7b2f.jpg',
            'url'=>'https://image.baidu.com/search/index?tn=baiduimage&ipn=r&ct=201326592&cl=2&lm=-1&st=-1&fm=result&fr=&sf=1&fmq=1534497811181_R&pv=&ic=0&nc=1&z=&se=1&showtab=0&fb=0&width=&height=&face=0&istype=2&ie=utf-8&word=cosplay&f=3&oq=cos&rsp=0'
        ],
        [
            'title'=>'2号美女',
            'des'=>'2美女',
            'pic'=>'http://image.baidu.com/search/index?word=cosplay&tn=baiduimage&ie=utf-8',
            'url'=>'http://img1.imgtn.bdimg.com/it/u=535547955,3559911238&fm=27&gp=0.jpg'
        ],

    ];
    require_once 'mm';
}elseif (in_array($content,$citys)){
    require_once 'tq';
}else{
    require_once 'hf';
}

//得到缓存中的数据
$data = ob_get_contents();
file_put_contents('data.xml', $data);