
<?php  
	header("Content-type:text/html;charset=utf-8");
	session_start();
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css"/>
		<style type="text/css">
			#log{
				width: 350px;
				height: 200px;
				border: 1px solid black;
				float: left;
				
			}
			.info1,.info2{
				display: none;
				color: red;
			}
			ul li{
				float: left;
				list-style-type: none;
				
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php" ;	
		 ?>
	<div id="log">
	  <ul class="nav nav-pills" role="tablist">
          <li role="presentation"><a href="javascript:;" onclick="tabNav(1)">登录</a></li>
 		  <li role="presentation"><a href="javascript:;" onclick="tabNav(2)">注册</a></li><br /><br />
		</ul>
		<div class="cnt" id="cnt_1" style="display:block;">
		<?php  
            if(@$_SESSION['username']){
			echo $_SESSION['username'].",欢迎您~ | " ; ?>
			<a href="exit.php">退出登录</a>
			<?php   }else{ ?>
			<form action="validate.php" method="post" enctype="multipart/form-data">
	            用户名：<input type="text" name="username" /> <br/><br/>
	            密码：<input name="pwd" type="password" /> <br/><br/>
	            <input type="checkbox" name="rem" id="rem" value="" />记住我 <input type="submit" id=""  value="登录"/>
	            </form>
				<?php   } ?>
		</div>
     <div class="cnt" id="cnt_2" style="display:none;">
     	姓名：<input type="text" name="username"class="user"onblur="nameCheck()"  /><span class="info1">用户已存在</span></br></br>
		
               密码：<input type="password" name="pwd" class="pwd" oninput="pwdCheck()" /><span class="info2">请使用6-16位数字字母下划线</span></br></br>
	   <button onclick="reg()">注册</button></div>
	</div>
	</body>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
		var a = true ;
		var b = true ;
		function reg(){
			//先判断格式ok与否
//			if( a==false || b==false ){
			if( !a || !b ){
				return 0
			}
			//注册业务
			$.ajax({
				type:"post",
				url:"reg_test.php",
				async:true,
				dataType:"json",
				data:{
					name: $(".user").val(),
					pwd:$(".pwd").val()
				},
				success:function(res){
					if(res){
						alert("注册成功")
					}else{
						alert("注册失败")
					}
				}
			});
		}
		function tabNav(num){
        for(var i=1;i<3;i++){
        document.getElementById('cnt_'+i).style.display = 'none';
		document.getElementById('cnt_'+num).style.display = 'block';}}
	   function nameCheck(){
	   	$.ajax({
	   		type:"post",
	   		url:"login_test.php",
	   		async:true,
	   		dataType:"json",
	   		data:{
	   			name:$(".user").val(),
	   		},
	   				success:function(res){
					console.log(res)
					if(res === 0){
						a = true 
						$(".info1").hide() ;
					}else{
						a = false
						$(".info1").show() ;
					}
				}
	   		
	   	});
	   }
	   function pwdCheck(){
			var reg = /^\w{6,16}$/ ;
			var res = reg.test($(".pwd").val()) ;		
			if(res){
				b = true
				$(".info2").hide()
			}else{
				b = false
				$(".info2").show()
			}
		}

	</script>
</html>
