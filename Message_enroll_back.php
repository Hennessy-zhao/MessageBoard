<!--*******************************************************************************注册系统的后台操作-->

<!--*******************************************************************************注册系统的后台操作-->

<?php
	header("content-type:text/html;charset=utf-8");
	require_once 'MessageTool.php';
	if($_POST['submit2'])
	{
		if($_POST['username']!=''&&$_POST['userpassword']!=''&&$_POST['userpad']!=''&&$_POST['email']!='')
		{
			$username=$_POST['username'];
			$userpassword=$_POST['userpassword'];
			$userpad=$_POST['userpad'];
			$email=$_POST['email'];

			//检测用户名是否重复
			$MysqliTool=new MysqliTool();
			$sqll="select username from users where username='$username' limit 0,1";
			$ress=$MysqliTool->execute_dql($sqll);
			if($row=$ress->fetch_assoc())
			{
				echo"<script language=\"javascript\">";
       			echo"alert(\"对不起，此用户名已被注册！\");" ;
        		echo"location.href=\"Message_enroll.php\"";
       			echo"</script>";
			}
			else
			{




				if($userpassword!=$userpad)
				{
					echo"<script language=\"javascript\">";
       				echo"alert(\"对不起，两次密码输入不同\");" ;
        			echo"location.href=\"Message_enroll.php\"";
       				echo"</script>";
				}
				else
				{
			
				//以下开始进行对数据库的精确查找
					
					$sql="insert into users(username,userpassword,email) value('$username',md5($userpassword),'$email')";
					$res=$MysqliTool->execute_dml($sql);

					if($res==1)
					{
						echo"<script type=\"text/javascript\" language=\"javascript\" charset=\"utf-8\">";
       					echo"alert(\"注册成功！！\");" ;
        				echo"location.href=\"land.php\"";
       					echo"</script>";
					}
					else
					{
						if($res==0)
						{
							echo "未成功";
						}
						else
						{
							echo "未影响行数";
						}
					}	
			
				}
			}
		}
		else
		{
			echo"<script language=\"javascript\">";
       		echo"alert(\"对不起，用户名或密码或邮箱不能为空\");" ;
        	echo"location.href=\"Message_enroll.php\"";
       		echo"</script>";
		}
	}
?>