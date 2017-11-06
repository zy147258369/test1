<?php
$name = $_POST['name'] ;
//3.数据库查询 返回是否存在
//4.把查询结果返回前端
$sql = "SELECT * FROM login WHERE username='$name' ";
$res = getSql($sql) ;
//print_r($res) ;
if($res){
	echo 1 ;
}else{
	echo 0 ;
}
//查询 获取
function getSql($sql){
	mysql_connect("localhost","root", "root") or die("连接失败");
	mysql_select_db("books");
	mysql_query("set names utf8");
	$res = mysql_query($sql) ;
	//取回结果  只取回满足条件的第一条
	$one =mysql_fetch_assoc($res) ;//返回的数组的索引是表中字段
//	$one = mysql_fetch_array($res) ;//自然索引和表字段各出现一次
//	$one = mysql_fetch_row($res) ;//自然索引
	return $one ;
?>
