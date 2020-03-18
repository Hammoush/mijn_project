<?php
include_once('database.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>zender</title>
	
	</head>
	
	<body>
			
				
						<?php
if(isset($_POST["submit"])){
$idsong=$_POST['idz'];
$duur=$_POST['oms'];
$titel=$_POST['slo'];
if($idsong && $duur && $titel ){
$insert=mysqli_query($db_conc," insert into song
(idsong,duur,titel)
VALUES
('$idsong','$duur','$titel')
 ");

if($insert){
	echo "<div class='success'>Insert Success..</div>";
}

}else{
	echo "<div class='error'>Insert Failed..</div>";
}

}
						
?>		
					
						<h3 > Add nummers</h3><br>
				

					<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>id nummer</label><br>
					     <input type="text" name="idz" required class="input">
					     <br><br>
					     <label>duur</label><br>
					     <input type="text" name="oms" required class="input">
					     <br><br>
					     <label>titel</label><br>
					     <input type="text" name="slo" required class="input">
					     <br><br>
					     <button type="submit" class="btn" name="submit">Add nummers</button>
					</form>
				
				
				</div>
				<br>
				
				
				
			</div>
	
	</body>
</html>