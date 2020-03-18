<?php 
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
  
       <div class="content" style="min-height: 700px">

<div style="margin: 20px auto; width: 50%; padding: 3px">
  
<table width="100%"><tr>
  <td width="50%">
   <form <?php if(isset($_POST['word'])){ ?> action="zoeken.php?word=<?php echo $_POST['word']; ?>" <?php } else { ?> action="zoeken.php" <?php } ?>    method="post">
<div style="width: 60%; padding: 5px; margin: 20px auto ">
<div style="padding: 3px">Zoeken op nummers </div><br>
<div>
  <input style="padding: 5px; width: 80%" type="text" name="word" value="<?php if(isset($_POST['word'])){ ?><?php echo $_POST['word']; ?>" <?php } else { ?><?php } ?>"></div><br>
<div>
  <input style="padding: 5px; cursor: pointer;" type="submit" name="submit" value="zoeken">
</div>
</div>
</form> 

  </td>


  <td width="50%">
   <form <?php if(isset($_POST['word1'])){ ?> action="zoeken.php?word=<?php echo $_POST['word1']; ?>" <?php } else { ?> action="zoeken.php" <?php } ?>    method="post">
<div style="width: 60%; padding: 5px; margin: 20px auto ">
<div style="padding: 3px">Zoeken op artiest </div><br>
<div>
  <input style="padding: 5px; width: 80%" type="text" name="word1" value="<?php if(isset($_POST['word1'])){ ?><?php echo $_POST['word1']; ?>" <?php } else { ?><?php } ?>"></div><br>
<div>
  <input style="padding: 5px; cursor: pointer;" type="submit" name="submit1" value="zoeken">
</div>
</div>
</form> 
    
  </td>


</tr></table>







<?php
if(isset($_POST['submit'])){
$word=$_POST['word'];

if($word){ ?>

<?php
$searchword=@mysqli_query($db_conc,"  select  * from  song where titel LIKE '".$word."%'   ");
$searchwordnum=@mysqli_num_rows(@mysqli_query($db_conc,"  select  * from  song where titel LIKE '".$word."%' "));
if($searchwordnum!=0){ 




?>
<table style="margin: 20px auto" width="100%" border="1" cellpadding="0" cellspacing="0">
  
<tr>
  <td style="padding: 5px">nemmer</td>
  <td style="padding: 5px">atriest</td>
</tr>



<?php
while($searchwordrow=mysqli_fetch_array($searchword)){ 

$artiest_has_song=@mysqli_query($db_conc,"  select  * from  artiest_has_song where 
  song_idsong  = '".$searchwordrow['idsong']."'   ");
$artiest_has_songrow=mysqli_fetch_array($artiest_has_song);


$artiest=@mysqli_query($db_conc,"  select  * from  artiest where idartiest   = '".$artiest_has_songrow['artiest_idartiest']."'   ");
$artiestrow=mysqli_fetch_array($artiest);



  ?>





<tr>
  <td style="padding: 5px"><?php echo $searchwordrow['titel']; ?></td>
  <td style="padding: 5px"><?php echo $artiestrow['artiestennaam']; ?></td>
</tr>

<?php } ?>






</table>



<?php } ?>
<?php
}else{ ?>

<meta http-equiv="refresh" content="0;url=zoeken.php">



<?php
}
}

?>





<?php
if(isset($_POST['submit1'])){
$word=$_POST['word1'];

if($word){ ?>

<?php
$searchword=@mysqli_query($db_conc,"  select  * from  artiest where artiestennaam LIKE '".$word."%'   ");
$searchwordnum=@mysqli_num_rows(@mysqli_query($db_conc,"  select  * from  artiest where artiestennaam LIKE '".$word."%' "));
if($searchwordnum!=0){ 




?>
<table style="margin: 20px auto" width="100%" border="1" cellpadding="0" cellspacing="0">
  
<tr>
  <td style="padding: 5px">nemmer</td>
  <td style="padding: 5px">atriest</td>
</tr>



<?php
while($searchwordrow=mysqli_fetch_array($searchword)){ 

$artiest_has_song=@mysqli_query($db_conc,"  select  * from  artiest_has_song where 
  artiest_idartiest   = '".$searchwordrow['idartiest']."'   ");
$artiest_has_songnum=@mysqli_num_rows(@mysqli_query($db_conc,"  select  * from  artiest_has_song where  artiest_idartiest   = '".$searchwordrow['idartiest']."' "));




while($artiest_has_songrow=mysqli_fetch_array($artiest_has_song)){


$song=@mysqli_query($db_conc,"  select  * from  song where idsong    = '".$artiest_has_songrow['song_idsong']."'   ");
$songrow=mysqli_fetch_array($song);



  ?>





<tr>
  <td style="padding: 5px"><?php echo $searchwordrow['artiestennaam']; ?></td>
  <td style="padding: 5px"><?php echo $songrow['titel']; ?></td>
  
</tr>

<?php } } ?>






</table>



<?php } ?>
<?php
}else{ ?>

<meta http-equiv="refresh" content="0;url=zoeken.php">



<?php
}
}

?>










</div>






       </div>
       
       <div class="footer">
        <p>All right by kreake&kronen</p>
       </div>
    </div>
  </body>
</html>
