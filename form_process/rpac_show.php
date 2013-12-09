
<?php
	
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
	
	if($name == 'pp'){
		$sql="SELECT * FROM teach_ppij WHERE Teach_PPIJ_TNO = '".$val."'";
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
			  <input type="radio" name="PPIJ_YN" >Yes <input type="radio" name="PPIJ_YN">NO<br />
			<label>API Score</label>
			  <input type="text" class="form-control" name="PPIJ_API" value="<?php echo $PPIJ_API; ?>"/><br />
		</div>
<?php
		
  }
?>



<!-- Script for showing data for "Articles Published" tab -->

<?php	

	if($name == 'apb'){
		$sql="SELECT * FROM teach_apb WHERE Teach_APB_TNO = '".$val."'";
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
            <table class="answer">
                <form method="post" name="apb" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
		       <tr> <td>Title With Page Numbers </td><td><input type="text" name="APB_TNO" value="<?php echo $APB_TNO; ?>" /></td></tr>
              <tr> <td> Book Title, Editor And Publisher </td><td><input type="text" name="APB_BEP" value="<?php echo $APB_BEP; ?>" /></td></tr>
		       <tr> <td>ISSN / ISBN No. </td><td><input type="text" name="APB_ISSN"  value="<?php echo $APB_ISSN; ?>" /></td></tr>
		     <tr> <td>  Whether peer reviewed. IMpact factor, if any</td><td> <input type="text" name="APB_WPR"  value="<?php echo $APB_WPR; ?>" /></td></tr>
		      <tr> <td> No. of Co-authors </td><td><input type="text" name="APB_NOC"  value="<?php echo $APB_NOC; ?>" /></td></tr>
		      <tr> <td>Whether you are the main Author </td><td><input type="radio" name="ACPB_Yes" />Yes <input type="radio" name="ACPB_No" />No<br /></td></tr>
		     <tr> <td> API Score </td><td><input type="text" name="APB_API"  value="<?php echo $APB_API; ?>" /></td></tr></table>
			 <input type="submit" value="Send" name="acpb_save" />
<?php

  }
  mysqli_close($con);
?>


