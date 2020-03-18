<?php
 include('database.php');
?>
<!DOCTYPE html>
<html>
<head>
 <title>login</title>

</head>
<body>
 



<form action="login3.php" method="post">
<label> login</label>
<input type="text" name="user" id="user" /><br /><br />

<label>password </label>
<input type="password" name="pass" id="pass" /><br /><br />

<input type="submit" value="login" name="submit"  /><br />
<br />
</form><br />
<div id="info">
<?php
if(isset($_POST['submit'])){
$user=$_POST['user'];
$pass=$_POST['pass'];


if($user==''){
echo'insert user';
}else if($pass==''){
echo 'insert password';	
}else{

$logicheck=@mysqli_num_rows(@mysqli_query($db_conc," select * from medeweker where 
	login='$user' and password='$pass' "));

if($logicheck==1){echo 'login success';}else{
	echo "you have not login";
}	


}

}

?>	


</div>


</body>
</html>