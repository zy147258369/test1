<?php
	header("Content-type:text/html;charset=utf-8");
	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			span{
				margin-left:50% ;
				font-size: 25px;
				font-weight: bolder;
			}
			table{
				margin-left:45% ;
			}
			button{
				position: absolute;
				left: 40%;
				top:7%;
			}
		</style>
	</head>
	<body>
		<!--购物车，读取/罗列当前用户的购物车数据库-->
		<span>购物车</span>
	<table border="" cellspacing="" cellpadding="">
		<tr>
			<th>图书</th>
			<th>书名</th>
			<th>数量</th>
			<th>单价</th>
			<th>结算</th>
			<th>删除</th>
		</tr>
	</table>
	<button onclick="userlist()">获取</button>
	</body>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		function userlist(){
			$.ajax({
				type:"post",
				url:"shopcars.php",
				async:true,
				dataType:"json",
				data:"123",
				success:function(res){
					console.log(res)
					for (var i=0;i<res.length;i++) {
						var tr=document.createElement("tr");
							for (var i=0;i<4;i++) {
							var td=document.createElement("td");
							if (i==0) {
								td.innerHTML=res[i][]
							}
							td.innerText=res[i]['avatar']
							}
							
						document.querySelector("table").appendChild(tr)
					}
				}
			});
		}
	</script>
</html>
