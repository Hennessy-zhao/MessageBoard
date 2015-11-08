<?php

	if(isset($_POST['submit1']))
	{
		$username=$_SESSION['user'];
		$title=$_POST['object'];
		$message=$_POST['message'];
		require_once 'MessageTool.php';
		if($username!='NULL'&&$title!='NULL'&&$message!='NULL')
		{
			$MysqliTool=new MysqliTool();
			$sqlll="insert into message(user,title,message,add_user,add_message,lastdate) value('$username','$title','$message','null','null',current_timestamp);";
			$res=$MysqliTool->execute_dql($sqlll);
			echo"<script language=\"javascript\">";
        	echo"location.href=\"Message_land_back.php\"";
       		echo"</script>";
		}
						
						
	}



	if(isset($_POST['submit3']))
	{
		if(isset($_POST['ids']))
		{
			require_once 'MessageTool.php';
			$MysqliTool=new MysqliTool();
			$ids=$_POST['ids'];
			$sq="delete from message where id=$ids";
			$re=$MysqliTool->execute_dml($sq);
			echo"<script language=\"javascript\">";
        	echo"location.href=\"Message_land_back.php\"";
       		echo"</script>";
		}
						
	}

	if(isset($_POST['submit5']))
	{
		if(isset($_POST['ids'])&&isset($_POST['add_user']))
		{
			require_once 'MessageTool.php';
			$MysqliTool=new MysqliTool();
			$id=$_POST['idss'];
			$add_user=$_POST['add_user'];
			$add_message=$_POST['add_message'];
			$sql="insert into add_message(messageid,add_user,add_message) value('$id','$add_user','$add_message')";
			$res=$MysqliTool->execute_dml($sql);
			echo"<script language=\"javascript\">";
        	echo"location.href=\"Message_land_back.php\"";
       		echo"</script>";
			
		}
	}
?>