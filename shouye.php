<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.wrap{
				width: 100vw;
				border:1px solid gainsboro;
			}
			.div{
				width:30vw;
				border: 1px solid gainsboro;
				float:left;
			}
			.pic img{
				width: 20vw;
				float: left;
			}
			.text{
				
			}
		</style>
	</head>
	<body>
		<?php 
			include "header.php";
		 ?>
		 <div class="wrap"></div>
	</body>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		res()
		function res(){
			$.ajax({
			type:"post",
			url:"shouyes.php",
			async:true,
			dataType:"json",
			data:"123",
			success:function(res){
				console.log(res)
				for (var i=0;i<res.length;i++) {
					var div=document.createElement("div")
					div.className="div"
					var div1=document.createElement("div1")
					div1.className="pic"
					div1.innerHTML="<img src='"+ res[i]['cover']+"'/>"
					var div2=document.createElement("div2")
					div2.className="text"
					div2.innerText=res[i]['text']
					var div3=document.createElement("div3")
					div3.className="pirce"
					div3.innerText=res[i]['pirce']
					var div4=document.createElement("div4")
					div4.className="buy"
					div4.innerText=res[i]['buy']
					div.appendChild(div1)
					div.appendChild(div2)
					div.appendChild(div3)
					div.appendChild(div4)
					document.querySelector(".wrap").appendChild(div)
				}
			}
		});
		}
	</script>
</html>