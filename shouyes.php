<?php
	$sql="SELECT * FROM book";
$res=json_encode(getSqls($sql));
echo $res;
function getSqls($sql){
	mysql_connect("localhost","root","root")or die("连接失败");
	mysql_select_db("books");
	mysql_query("set names utf8");
	$res=mysql_query($sql);
	while($one=@mysql_fetch_assoc($res)){
		$list[]=$one;
//		print_r($list);
		
	}
	return $list;
}
