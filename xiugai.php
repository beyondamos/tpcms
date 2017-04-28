<?php
header('Content-Type:text/html;charset=utf-8');
$link = mysqli_connect('localhost','root','') or die('数据库连接失败');
mysqli_query($link,'use ishequan');
mysqli_query($link,'set names utf8');

$sql = "select `article_id`,`titleimg` from `isq_news`";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_assoc($query)){
    $titleimg = str_replace('Public','/Public',$row['titleimg']);
    echo $titleimg;
    mysqli_query($link,"update `isq_news` set `titleimg` = '{$titleimg}' where `article_id` = '{$row['article_id']}'");
}