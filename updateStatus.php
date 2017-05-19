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
		<td colspan="2">Ðang nh?p thành công</td>
    </tr>
    <tr>
		<td><strong>Xin chào:</strong> </td>
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