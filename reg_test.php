<?php
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$sql = " INSERT INTO login(username , password) VALUES ('$name' , '$pwd')  ";
$res = add($sql) ;
if($res){
	echo 1 ;
}else{
	echo 0 ;
}

//封装成函数，
function add($sql){
	mysql_connect("localhost" , "root","root") ;
	$res = mysql_select_db("books") ;
	mysql_query(" set names utf8") ;
	$res1 = mysql_query($sql) ;
	$af = @mysql_affected_rows($res1);
	if($res1){
		mysql_close();
//		echo "入库ok" ;
//		var_dump($af) ;
		return 1 ;
	}else{
//		echo "入库失败";
		return 0 ;
	}
}
?>
