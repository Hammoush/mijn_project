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
<a style="color: #fff" href="logout1.php">logout</a>
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
echo'<meta http-equiv="refresh" content="0;url=plijlist.php">'; 
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


<?php if(@$_SESSION['rollen']==1){ ?>


<?php
 
$prgramma=@mysqli_query($db_conc," select * from  prgramma  order by idprgramma  ASC");
while ($prgrammarow=@mysqli_fetch_array($prgramma) ) {
$idprgramma=$prgrammarow['idprgramma'];

$omschrijven=$prgrammarow['omschrijven'];

?>

<div style="margin: 20px auto; width: 50%; border: 1px solid #000; padding: 3px">
<div style="padding: 3px">Naam programma : <?php echo $omschrijven; ?></div>
<div>Playlist</div>
<table  border="1" cellpadding="0" cellspacing="0" width="100%">
<?php

$playlist2=@mysqli_query($db_conc," select * from playlist  where programma_idprogramma  ='$idprgramma'");
while($playlistrow3=@mysqli_fetch_array($playlist2) ){
$song_idsong  =$playlistrow3['song_idsong'];

$artiest_has_song3=@mysqli_query($db_conc," select * from artiest_has_song  where 
  song_idsong ='$song_idsong'");
$artiest_has_songrow3=@mysqli_fetch_array($artiest_has_song3) ;
$artiest_idartiest  =$artiest_has_songrow3['artiest_idartiest'];





$song=@mysqli_query($db_conc," select * from song  where idsong   ='$song_idsong'");
$songrow=@mysqli_fetch_array($song) ;
$titel=$songrow['titel'];
$duur=$songrow['duur'];


$artiest=@mysqli_query($db_conc," select * from artiest  where idartiest  ='$artiest_idartiest'");
$artiestrow=@mysqli_fetch_array($artiest) ;
$artiestennaam=$artiestrow['artiestennaam'];




?>

 <tr>
 <td width="45%"><?php echo $artiestennaam;?></td>
<td width="45%"><?php echo $titel;?></td>
<td width="10%"><?php echo $duur;?></td>
</tr>
<?php } ?>

</table>

</div>


<?php } ?>



<?php } ?>






       </div>
       
       <div class="footer">
        <p>All right by kreake&kronen</p>
       </div>
    </div>
  </body>
</html>
