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
 
$prgramma=@mysqli_query($db_conc," select * from  prgramma  where  idprgramma ='".$_GET['id']."'");
$prgrammarow=@mysqli_fetch_array($prgramma) ;

$omschrijven=$prgrammarow['omschrijven'];

?>
<form action="edit-programa.php" method="post">
<div style="width: 60%; padding: 5px; margin: 20px auto ">
<div style="padding: 3px">omschrijven </div><br>
<div><input style="padding: 5px; width: 80%" type="text" name="omschrijven" value="<?php echo $omschrijven;?>"></div><br>
<div>
  <input style="padding: 5px; cursor: pointer;" type="submit" name="submit" value="wijzig">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
</div>
</div>
</form>


<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$omschrijven=$_POST['omschrijven'];
if($omschrijven){
$edit=mysqli_query($db_conc,"  update prgramma set omschrijven='$omschrijven' where idprgramma='$id' ");
if($edit){ ?>
<meta http-equiv="refresh" content="0;url=edit-programa.php?id=<?php echo $id; ?>">
<?php  
}
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
