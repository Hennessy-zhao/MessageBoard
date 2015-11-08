<!--*******************************************************************对land.php的后台操作-->





<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="black">
	<div id="top-top">
		<br/>
		<?php
		header("content-type:text/html;charset=utf-8");
	require_once 'MessageTool.php';
	if(isset($_POST['username'])&&isset($_POST['userpassword']))
	{
		if($_POST['username']!=''&&$_POST['userpassword']!='')
		{
			$usernam=$_POST['username'];
			$pad=$_POST['userpassword'];
			
			$userpassword=md5($pad);
			//以下开始进行对数据库的精确查找
			$MysqliTool=new MysqliTool();
			$sql="select userpassword from users where username='$usernam' limit 0,1";
			$res=$MysqliTool->execute_dql($sql);

			if($row=$res->fetch_assoc())
			{
				$password=$row['userpassword'];
				if($password==$userpassword)
				{
					$_SESSION['user']=$usernam;
				}
				else
				{
					echo"<script language=\"javascript\">";
       				echo"alert(\"对不起，用户名或密码错误！！！！\");" ;
        			echo"location.href=\"land.php\"";
       				echo"</script>";
				}
			}
			else
			{
				echo"<script language=\"javascript\">";
       			echo"alert(\"对不起，用户名或密码错误！！！！\");" ;
        		echo"location.href=\"land.php\"";
       			echo"</script>";
			}
			
		}
			$res->free();	
	}
	echo "<p align='right'>";
	echo $_SESSION['user'];
	echo "<script>function getDate(){confirm(\"确定退出登录？\");location.href=\"land.php\";} </script>";
	echo "<a href=\"#\" onclick=\"getDate()\"> 退出</a>";
	echo "</p>";
?>
		
		
	</div>
	<div id="container">
		<div id="top">
			<div id="top-middle">
				<font size="6px" face="华文楷体" ><center>耽&nbsp&nbsp&nbsp美&nbsp&nbsp&nbsp评&nbsp&nbsp&nbsp论&nbsp&nbsp&nbsp圈</center></font>
			</div>
		</div>
		<div id="middle">
			<div id="middle-left">
			<?php 
				header("content-type:text/html;charset=utf-8");
				require_once 'MessageTool.php';
				$MysqliTool=new MysqliTool();
				$sql="select * from message";
				$res=$MysqliTool->execute_dql($sql);
				while ($row=$res->fetch_assoc()) 
				{
					
					$id=$row['id'];
					$add_user=$_SESSION['user'];

					echo "<table width='780' >";
						echo "<tr>";
							echo"<td colspan='2'><hr color='#6699FF' size='20px' align=center width='780px'></td>";
						echo "</tr>";
						echo "<tr>";
							echo"<td><p align='left'>".$row['id']."楼&nbsp&nbsp&nbsp&nbsp<p></td>";
							echo"<td  align='right'><form action='back.php' method='post'><input type='hidden' name='ids' value='$id'><input type='submit' name='submit3' value='删除'></form></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td><font size='5px' face='黑体' color='blue'>【".$row['title']."】</font></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td align='right' colspan='2'>".$row['user']."</td>";
						echo "</tr>";
						echo "<tr>";
							echo"<td colspan='2'><hr color='#333333' size='1px' align=center width='780px'></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td colspan='2'><font size='4px' face='华文楷体'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['message']."</font></td>";
						echo "</tr>";
						//输出add_message
						
						echo "<tr>";
							echo"<td colspan='2'><hr color='#333333' size='1px' align=center width='780px'></td>";
						echo "</tr>";
						echo "<tr>";
							echo"<td colspan='2'>评论如下</td>";
						echo "</tr>";
						$sqll="select * from add_message where messageid='$id'";
						$ress=$MysqliTool->execute_dql($sqll);
						
						while ($roww=$ress->fetch_assoc()) {
						
							echo "<tr>";
								echo "<td colspan='2'>".$roww['add_user'].":".$roww['add_message']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo"<td colspan='2'><hr style='border:1px dashed #000; ;width='780px'></td>";
							echo "</tr>";
						}
						echo "<tr>";
							echo"<td colspan='2'><hr color='#CCCC99' size='0.5px' align=center width='780px'></td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td align='right' colspan='2'>".$row['lastdate']."</td>";
						echo "</tr>";
					
						echo "<form action='back.php' method='post'>";
						echo "<tr>";
							echo"<td colspan='2' align='left'>请在下面输入点评</textarea></td>";
						echo "</tr>";
						
						echo "<tr>";
							echo"<td colspan='2'><textarea name='add_message' rows='2' cols='95'></textarea></td>";
						echo "</tr>";
						

						echo "<tr>";
							
							echo"<td colspan='2'><input type='hidden' name='idss' value='$id'><input type='hidden' name='add_user' value='$add_user'><input type='submit' name='submit5' value='提交'></td>";
						echo "</tr>";	
						echo "</from>";
						
						echo "<tr>";
							echo"<td colspan='2'><hr color='black' size='1px' align=center width='780px'></td>";
						echo "</tr>";
						
					echo "</table>";
				}
								


			?>
			</div>
			<div id="middle-right">
				<br/>
				<font face="华文楷体" size="3px">
				<table width="180px" height="480px" align="center">

					<tr align="center"><td><font face="华文琥珀" size="5px">评论须知</font></td></tr>
					<tr><td>1)本评论圈全发言禁止匿名</td></tr>
					<tr><td>2)评论圈发言禁止只可以涉及有关耽美内容，非腐女者自行绕道</td></tr>
					<tr><td>3）本圈发言禁止爆粗口，互相攻击，违者禁号</td></tr>
					<tr><td>4）本评论圈禁止散播淫秽，不健康信息，违者禁号</td></tr>
					<tr><td>5）禁止刷屏</td></tr>
					<tr><td>&nbsp</td></tr>
					<tr><td>&nbsp</td></tr>
					<tr><td>&nbsp</td></tr>
					<tr><td>耽美评论圈官方群号：xxxxxxxxxxxxx</td></tr>
					<tr><td>评论圈圈主：Hennessy</td></tr>
					<tr><td>&nbsp</td></tr>
				</table>
				</font>
				
			</div>
		</div>
		<div id="botton">
			<div id="botton-middle">
				<form action="back.php" method="post">
				<p id="user">	</p>
				<br/><font face="黑体">发表留言</font>
				<br/>昵称<?php echo  $_SESSION['user'];?>
				<br/>主题<input type="text" name="object">
				<br/>内容
				<br><textarea name="message" rows="8" cols="103"></textarea>
				<br/><br/><center><input type="submit" name="submit1" value="发表" style="width:60px;height:25px;"></center>
				</form>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>



