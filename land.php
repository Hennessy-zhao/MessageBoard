<!--**************************************************************登录注册的登录界面-->

<!--
create table message(
id int primary key auto_increment,
user varchar(25) not null,
title varchar(50) not null,
message text not null,
add_user varchar(25),
add_message text,
lastdate datetime not null
)default charset=utf8;


insert into test values('3',current_timestamp,null);


insert into message(user,title,message,add_user,add_message,lastdate) value('Hennessy','花容天下','重莲挚爱林宇凰','null','null',current_timestamp);
insert into message(user,title,message,add_user,add_message,lastdate) value('Hennessy','花容天下','拉拉啦啦啦','null','null',current_timestamp);
insert into message(user,title,message,add_user,add_message,lastdate) value('Hennessy','花容天下','嘿嘿嘿嘿嘿','null','null',current_timestamp);
-->



<!DOCTYPE html>
<html>
<head>
	<title>登陆耽美评论圈</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<style type="text/css">
	*{	margin:0 auto;
	    	padding:0px;
		}
		#container{
			width: 1300px;
			height: 500px;
			background: white;
		}
			#center{
				width: 500px;
				height: 400px;
				margin-top: 80px;
				margin-left: 400px;
				background: white;
				border-radius: 25px 25px 0px 0px;
				box-shadow: 1px 1px 5px 5px #F5F5F5;

			}
				#center-top{
				width: 500px;
				height: 70px;
				background: pink;
				float: right;
				box-shadow: 1px 1px 5px 5px #F5F5F5;
				border-radius: 25px 25px 0px 0px;
				}

				#center-botton{
				width: 500px;
				height: 325px;
				
				margin-top: 5px;
				background:#B0E0E6;
				float: right;
				text-align: center;
				font-size: 25px;
				
				}
	</style>
</head>
<body>
	<div id="container">
		<div id="center">
			<div id="center-top">
				<center>
					<font size="6px" face="华文彩云"><pre>耽 &nbsp&nbsp&nbsp美 &nbsp&nbsp&nbsp 网</font>
				</center>
			</div>
			<div id="center-botton">
				
					
					<form action="Message_land_back.php" method="post">
						<table width="300px" height="250px" align="center">
							<tr colspan="2">
								<font size="8px" face="华文楷体">账号登录</font>
							</tr>
							<tr>
								<td>输入账号</td>
								<td><input type="text" name="username" ></td>
							</tr>
							<tr>
								<td>输入密码</td>
								<td><input type="password" name="userpassword"></td>
							</tr>
							<tr>
								<td><input type="submit" name="submit1" value="&nbsp&nbsp&nbsp&nbsp登陆&nbsp&nbsp&nbsp&nbsp"></td>
								<td><font size="3px"><a href="Message_enroll.php">未注册？？？点击注册</a></font></td>
							</tr>
						</table>
						
					</form>
				
			</div>
		</div>
		
	</div>
</body>
</html>