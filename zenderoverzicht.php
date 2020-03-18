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
  
       <div class="content">

<div style="margin: 20px auto; width: 100%; padding: 3px">
  




<?php
 
$zender=@mysqli_query($db_conc," select * from  zender  where  idzender ='".$_GET['id']."'");
$zenderrow=@mysqli_fetch_array($zender) ;

$omsrijven=$zenderrow['omsrijven'];

?>

<div style="width: 60%; padding: 5px; margin: 20px auto ">
<div style="padding: 3px">Zender <?php echo $omsrijven; ?></div>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
  <td style="padding: 3px">Programma</td>  
 <td style="padding: 3px">Datum</td>  
  <td style="padding: 3px">Tijd</td>  
   <td style="padding: 3px">Duur in minuten</td>  
    <td style="padding: 3px">Presentator</td>  
     <td style="padding: 3px">wijzig</td>  
      <td style="padding: 3px">verwijder</td>  
  </tr>

<?php
 
$uitzending=@mysqli_query($db_conc," select * from  uitzending  where  idzender ='".$_GET['id']."'");
while($uitzendingrow=@mysqli_fetch_array($uitzending)){

$idprogramma =$uitzendingrow['idprogramma'];

$prgramma=@mysqli_query($db_conc," select * from   prgramma  where  idprgramma  ='".$idprogramma."'");
$prgrammarow=@mysqli_fetch_array($prgramma) ;

$omschrijven=$prgrammarow['omschrijven'];



$datum =$uitzendingrow['datum'];
 $begintijd =$uitzendingrow['begintijd'];
 $eindtijd =$uitzendingrow['eindtijd'];

$presentator =$uitzendingrow['presentator'];
 
$medeweker=@mysqli_query($db_conc," select * from   medeweker  where  idmedeweker   ='".$presentator."'");
$medewekerrow=@mysqli_fetch_array($medeweker) ;

$voornaam=$medewekerrow['voornaam'];

?>

  <tr>
  <td style="padding: 3px"><?php echo $omschrijven; ?></td>  
 <td style="padding: 3px"><?php echo $datum; ?></td>  
  <td style="padding: 3px"><?php echo $begintijd; ?></td>  
   <td style="padding: 3px"><?php echo $eindtijd; ?></td>  
    <td style="padding: 3px"><?php echo $voornaam; ?></td>  
     <td style="padding: 3px"><a href="edit-programa.php?id=<?php echo $idprogramma; ?>">wijzig</a></td>  
      <td style="padding: 3px">
      <form method="_POST" action="zenderoverzicht.php?id=<?php echo $_GET['id']; ?>">
  <input style="padding: 5px; cursor: pointer;" type="submit" name="submit" value="verwijder">
  <input type="hidden" name="id" value="<?php echo $idprogramma; ?>"> 
      </form>  
        
      </td>  
  </tr>




<?php  } ?>


</table>


<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];

$delete=mysqli_query($db_conc,"  delete from prgramma  where idprgramma ='$id' ");
if($delete){ ?>
<meta http-equiv="refresh" content="0;url=zenderoverzicht.php?id=<?php echo $_GET['id']; ?>">
<?php  

}


}





?>



</div>










</div>






       </div>
       
       <div class="footer">
        <p>All right by kreake&kronen</p>
       </div>
    </div>
  </body>
</html>
