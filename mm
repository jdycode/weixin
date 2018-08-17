<xml>
    <ToUserName><![CDATA[<?=$fromusername?>]]></ToUserName>
    <FromUserName><![CDATA[<?=$toUsername?>]]></FromUserName>
    <CreateTime><?=time()?></CreateTime>
    <MsgType><![CDATA[news]]></MsgType>
    <ArticleCount><?=count($girls)?></ArticleCount>
    <Articles>
    <?php foreach($girls as $girl):?>
    <item>
        <Title><![CDATA[<?=$girl['title']?>]]></Title>
        <Description><![CDATA[<?=$girl['des']?>]]></Description>
        <PicUrl><![CDATA[<?=$girl['pic']?>]]></PicUrl>
        <Url><![CDATA[<?=$girl['url']?>]]></Url>
    </item>
    <?php endforeach;?>

</xml>