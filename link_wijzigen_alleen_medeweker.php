<?php 
@ob_start();
@session_start();
include_once('database.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Radio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="wrapper">
<form action="" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="
  background-color: #0082e6;
   margin-bottom: 4px;">



   <tr>
<td width="50%">
     <div style=" padding:10px;font-size:35px; clear:both;  "> 
      Kraeken & Krønen
     </div>  


</td>
<td width="20%" align="center">
  <?php if(!@$_SESSION['id']){ ?>
  <input name="user" style="width: 90%; padding: 5px" placeholder="username">
<?php } ?>
</td>
<td width="20%" align="center">
<?php if(!@$_SESSION['id']){ ?>
  <input type="password" name="pass" style="width: 90%; padding: 5px" placeholder="password">
<?php }else{ ?>
<?php echo $_SESSION['username'];  ?>
<?php } ?>

</td>
<td width="10%" align="center">
  <?php if(!@$_SESSION['id']){ ?>
  <input type="submit" name="submit" value="login" style="width: 90%; padding: 5px; cursor: pointer;">
<?php }else{ ?>
<a style="color: #fff" href="logout2.php">logout</a>
<?php } ?>
</td>
</tr>

<tr>
<td colspan="3" align="center">
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

if($logicheck==1){
$logirow=@mysqli_fetch_array(@mysqli_query($db_conc," select * from medeweker where 
  login='$user' and password='$pass' "));
$loginid=$logirow['idmedeweker'];
$loginusername=$logirow['login'];
$loginrollen=$logirow['rollen'];
$_SESSION['id']=$loginid;
$_SESSION['username']=$loginusername;
$_SESSION['rollen']=$loginrollen;
echo'<meta http-equiv="refresh" content="0;url=link_wijzigen_alleen_medeweker.php">'; 
}else{
  echo "you have not login";
} 


}

}

?>  
</td>
</tr>


</table>
</form>
      <div class="header">
<?php if(@$_SESSION['rollen']==1){ ?>
          <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
              <i class="fas fa-bars"></i>
            </label>
            
            <ul>
              <li><a class="active" href="#">Home</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Zenders</a></li>
            </ul>
          </nav>
<?php } ?>
       </div>   
       <div class="content">

<div style="margin: 20px auto; width: 50%; padding: 3px">
  




<?php
 
$zender=@mysqli_query($db_conc," select * from  zender  order by idzender   ASC");
while ($zenderrow=@mysqli_fetch_array($zender) ) {
$idzender=$zenderrow['idzender'];
$omsrijven=$zenderrow['omsrijven'];
$slogan=$zenderrow['slogan'];
?>

<div style="width: 33%; border: 1px solid #000; padding: 5px; float: left; height: 100px">
<div style="padding: 3px"><?php echo $omsrijven; ?></div>
<div><?php echo $slogan; ?></div>

<a <?php if(@$_SESSION['rollen']==1){ ?>  href="zenderoverzicht.php?id=<?php echo $idzender; ?>" target="_blank"   <?php } ?> ><div style="padding: 3px">programmaoverzicht</div></a>
</div>






<?php } ?>



</div>






       </div>
       
       <div class="footer">
        <p>All right by kreake&kronen</p>
       </div>
    </div>
  </body>
</html>
