<?php
include("config.inc.php");
if($_POST)
{
	$userID = trim($_POST['userID']);
	$password = trim($_POST['password']);
	//neu dang nhap dung
	if($username == '111111' && $password == '111111')
	{
?> 
<table >
    <tr>
		<td colspan="2">�ang nh?p th�nh c�ng</td>
    </tr>
    <tr>
		<td><strong>Xin ch�o:</strong> </td>
		<td><?php echo $username ?></td>
    </tr> 
</table>
<?php
	}else{
	    //neu dang nhap sai
	    echo 'false';
	}
}
?>