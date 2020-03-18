<?php
 include('database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>zender</title>
	
	</head>
	
	<body>
			
				
			
					
						<h3 > verwijderen nummers</h3><br>
						
	<?php
	if(isset($_POST["submit"])){
	$idz=$_POST['idz'];

$sqle=mysqli_query($db_conc," delete  from song where 	idsong ='$idz' ");
if($sqle){echo 'delete success';}else{echo 'delete not  success';}


				
	}
						
					?>
					<form method="post" action="verwijderen.php">
					     <label>id artiest</label><br>
					     <input type="text" name="idz" required class="input">
					     <br><br>
					     <label>duur</label><br>
					     <input type="text" name="oms" >
					     <br><br>
					     <label>titel</label><br>
					     <input type="text" name="slo">
					     <br><br>
					     <button type="submit" class="btn" name="submit">verwijderen nummers</button>
					</form>
				
				
				</div>
				<br>