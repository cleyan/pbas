
<?php
	session_start();
	ob_start();
	    $val=$_GET["val"];
	$name = $_GET['name'];

	#Database Connection
	$con = mysqli_connect('localhost','root','','pbas_db');
	if (!$con)
  	{
		die('Could not connect: ' . mysqli_error($con));
 	}
?>

<!-- Script for showing data for "Published Papers in Journal" tab -->

<?php
	$year=$_SESSION['pbasYear'];

	if($name == 'pp'){
		$sql="SELECT * FROM teach_ppij WHERE Teach_PPIJ_TNO = '$val' and year='$year'";
		$result = mysqli_query($con,$sql) or die('Error'.mysqli_error($con));
		 $row = mysqli_fetch_array($result);
 		$PPIJ_TNO = $row['Teach_PPIJ_TNO'];
	    $PPIJ_Journal = $row['Teach_PPIJ_Journal'];
		$PPIJ_ISBN = $row['Teach_PPIJ_ISBN'];
		$PPIJ_PR = $row['Teach_PPIJ_PR'];
		$PPIJ_NCA = $row['Teach_PPIJ_NCA'];
		$PPIJ_YN = $row['Teach_PPIJ_MA'];
		$PPIJ_API = $row['Teach_PPIJ_API'];

?>
        
		<br><div class="form-group">
			<label>Title With Page Numbers</label> 
			  <input type="text" class="form-control" name="PPIJ_TNO" value="<?php echo $PPIJ_TNO; ?>">
			<label>Journal</label>
			  <input type="text" class="form-control" name="PPIJ_Journal" value="<?php echo $PPIJ_Journal; ?>"/>
			<label>ISSN / ISBN No. </label>
			  <input type="text" class="form-control" name="PPIJ_ISBN" value="<?php echo $PPIJ_ISBN; ?>"/>
			<label> Whether peer reviewed. IMpact factor, if any</label>
			  <input type="text" class="form-control" name="PPIJ_PR" value="<?php echo $PPIJ_PR; ?>"/>
			<label>No. of Co-authors</label>
			  <input type="text" class="form-control" name="PPIJ_NCA" value="<?php echo $PPIJ_NCA; ?>"/>
			<label>Whether you are the main Author</label>

			  <!-- <input type="radio" name="PPIJ_YN" >Yes <input type="radio" name="PPIJ_YN">NO<br /> -->
			  <?php if($PPIJ_YN == "Yes"){

							?>

				    		Yes<input type="radio" name="PPIJ_YN" id="optionsRadios1" value="yes" <?php echo "checked" ?>>
						    No<input type="radio" name="PPIJ_YN" id="optionsRadios2" value="no"><br><br>
							<?php 
							   }
							   else{ 
							?>
							   		Yes<input type="radio" name="PPIJ_YN" id="optionsRadios1" value="yes" >
						    No<input type="radio" name="PPIJ_YN" id="optionsRadios2" value="no" <?php echo "checked" ?>><br><br>
							 <?php   }
							?>
			<label>API Score</label>
			  <input type="text" class="form-control" name="PPIJ_API" value="<?php echo $PPIJ_API; ?>"/><br />
			  <input class="btn btn-primary" type="submit" value="Save" name="ppij_save" />
						<select name="pp" onChange="showUser(this.value, this.name)">
							<option>--Title--</option>
							<?php 
								include('DBConnect.php');
								$uname=$_SESSION['username'];
								$year=$_SESSION['pbasYear'];
								$query = mysqli_query($con,"SELECT * from teach_ppij where user_id='$uname' and year='$year'");
								while($row = mysqli_fetch_assoc($query)){
							?><option><?php echo $row['Teach_PPIJ_TNO']; ?></option>
							<?php } ?>
						</select>
						<input type="submit" class="btn btn-primary"  value="Delete" name="ppij_delete" />
						<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
		</div>
<?php
		
  }
?>



<!-- Script for showing data for "Articles Published" tab -->

<?php	

	if($name == 'apb'){
		$sql="SELECT * FROM teach_apb WHERE Teach_APB_TNO = '".$val."' and year='$year'";
		$result = mysqli_query($con,$sql) or die('Error'.mysqli_error($con));
		 $row = mysqli_fetch_array($result);
 		$APB_TNO = $row['Teach_APB_TNO'];
 		$APB_BEP = $row['Teach_APB_BEP'];
 		$APB_ISSN = $row['Teach_APB_ISSN'];
 		$APB_WPR = $row['Teach_APB_WPR'];
 		$APB_NOC = $row['Teach_APB_NOC'];
 		$APB_YN = $row['Teach_APB_MA'];
	    $APB_API = $row['Teach_APB_API'];
?>
        <h3>Articles / Chapters published in Books</h3>
            
			
			 <div class="form-group">
								<label>Title With Page Numbers </label>
								  <input type="text" class="form-control required" name="APB_TNO" value="<?php echo $APB_TNO; ?>" />
								<label>Book Title, Editor And Publisher </label>
								  <input type="text" class="form-control" name="APB_BEP"  value="<?php echo $APB_BEP; ?>"/>
								<label>ISSN / ISBN No.</label> 
								   <input type="text" class="form-control" name="APB_ISSN" value="<?php echo $APB_ISSN; ?>"/>
								<label>Whether peer reviewed. IMpact factor, if any</label>
								  <input type="text" class="form-control" name="APB_WPR" value="<?php echo $APB_WPR; ?>"/>
								<label>No. of Co-authors </label>
								   <input type="text" class="form-control" name="APB_NOC" value="<?php echo $APB_NOC; ?>"/>
								<label>Whether you are the main Author</label> 
								  <input type="radio" name="ACPB_Yes" />Yes 
								  <input type="radio" name="ACPB_No" />No<br />
								<label>API Score</label> <input type="text" class="form-control required" placeholder="API Score" name="APB_API" value="<?php echo $APB_API; ?>"/><br />
								
							</div>
<?php

  }
  mysqli_close($con);
?>


