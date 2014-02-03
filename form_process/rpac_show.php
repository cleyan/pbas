
<?php
	session_start();
	ob_start();
	    $val=$_GET["val"];
	$name = $_GET['name'];
	$user=$_SESSION['username'];
	$year=$_SESSION['pbasYear'];
	#Database Connection
	$con = mysqli_connect('localhost','root','','pbas_db');
	if (!$con)
  	{
		die('Could not connect: ' . mysqli_error($con));
 	}
?>

<!-- Script for showing data for "Published Papers in Journal" tab -->

<?php
	

	if($name == 'pp'){
		$sql="SELECT * FROM teach_ppij WHERE user_id='$user' and Teach_PPIJ_TNO = '$val' and year='$year'";
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
								$query = mysqli_query($con,"SELECT * from teach_ppij where user_id='$user' and year='$year'");
								while($row = mysqli_fetch_assoc($query)){
							?><option><?php echo $row['Teach_PPIJ_TNO']; ?></option>
							<?php } ?>
						</select>
						<input type="submit" class="btn btn-primary"  value="Delete" name="ppij_delete" />
						<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
		</div>




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

<!-- Script for showing data for "Full papers in Conference Proceedings " tab -->

<?php	

	if($name == 'fp'){
		$sql="SELECT * FROM teach_fcp WHERE user_id='$user' Teach_FCP_TNO = '$val' and year='$year'";
		$result = mysqli_query($con,$sql) or die('Error'.mysqli_error($con));
		 $row = mysqli_fetch_array($result);
 		$FCP_TNO = $row['Teach_FCP_TNO'];
 		$FCP_BEP = $row['Teach_FCP_BEP'];
 		$FCP_ISSN = $row['Teach_FCP_ISSN'];
 		$FCP_NOC = $row['Teach_FCP_NOC'];
 		$FCP_MA = $row['Teach_FCP_MA'];
	    $FCP_API = $row['Teach_FCP_API'];
?>
        <h3>Full Papers in Conference Proceedings</h3>
            
			
			 <div class="form-group">
								<label> Title With Page Numbers</label>
							<input class="form-control" type="text" name="FCP_TNO" value=" <?php echo $FCP_TNO ?>"> 
						<label>Details of Conference publications</label>  
							<input class="form-control" type="text" name="FCP_BEP"  value=" <?php echo $FCP_BEP ?>"/> 
						<label>ISSN / ISBN No. </label>
							<input class="form-control" type="text" name="FCP_ISSN" value=" <?php echo $FCP_ISSN ?>"/> 
						<label>No. of Co-authors </label>
							<input class="form-control" type="text" name="FCP_NOC" value=" <?php echo $FCP_NOC ?>"/> 
						 <label> Whether you are the main Author</label>
							<input type="radio" name="FPCP_Yes" />Yes <input type="radio" name="FPCP_No" />No<br /> 
						<label>API Score </label>
							<input class="form-control" type="text" name="FCP_API" value=" <?php echo $FCP_API ?>"/> 
					  </div>
						<br><input class="btn btn-md btn-primary" type="submit" value="Save" name="fpcp_save" />
						<select name="fp">
							<option>--Title--</option>
							<?php 
								$sql3 = mysqli_query($con,"SELECT * from teach_fcp where year='$year' and user_id='$user'");
								while($row = mysqli_fetch_assoc($sql3)){
									?><option><?php echo $row['Teach_FCP_TNO']; ?></option>
							<?php } ?>
						</select>
						<input class="btn btn-md btn-primary" type="button" value="Delete" /> 
						<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
							</div>


<?php
  
  mysqli_close($con);
?>


