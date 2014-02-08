<?php
	session_start();
	include('DBConnect.php');
	include('form_process/rpacProcess.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Research Publication </title>
<?php
	include('cssLinks.php');
	include('jsLinks.php');
?>
<style type="text/css">
    /* Custom Styles */
    ul.nav-tabs{
        width: 230px;
        margin-top: 20px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li a{
        padding: 8px 16px;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    .nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
</style>
</head>
<body data-spy="scroll" data-target="#myNav">
<?php
	if(isset($_SESSION['username']) and isset($_SESSION['pbasYear'])){
		include('header.php');
		$user=$_SESSION['username'];
		$year=$_SESSION['pbasYear'];
   ?>
<div class="container">
	
	<center><h3><b>Research Publication And Academic Contribution</b></h3></center>
    <div class="row-fluid">
    <br><br>
        <div class="col-md-4" id="myNav">
            <ul style="box-shadow:5px 5px 5px #888888" data-spy="affix" data-offset-top="190">
                <a href="ppij.php">Published Papers in Journals</a> <br><br>
                
                <a href="apb.php">Articles/ Chapters published in Books </a><br><br>
                <li class="active"><a href="fcp.php">Full papers in Conference Proceedings </a><br><br></li>
                <a href="bpe.php">Books published as single author or as editor </a><br><br>
                <a href="opc.php">Ongoing Projects/ Consultancies</a><br><br>
				<a href="cpc.php">Completed Projects/ Consultancies</a><br><br>
				<a href="rg.php">Research Guidance </a><br><br>
				<a href="fdp.php">Training Courses, Teaching-Learning-Evaluation Technology, Faculty Development Programmes</a><br><br>
				<a href="ppc.php">Papers presented in Conferences, Seminars, Workshops, Symposia</a><br><br>
				<a href="ilc.php"> Invited Lectures and Chairmanship at National or International Conference/ Seminar</a><br><br>
            </ul>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-md-7">
            			
		<!--"Full Papers in Conference" form started -->						
				  <h3 id="fullPapers" class="panel-title" align="center">Full Papers in Conference Proceedings</h3><br>
				
				  <form method="post" name="fpcp" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
					  <div id="fullPapersConf">
						<label> Title With Page Numbers</label>
							<input class="form-control" type="text" name="FCP_TNO"> 
						<label>Details of Conference publications</label>  
							<input class="form-control" type="text" name="FCP_BEP" /> 
						<label>ISSN / ISBN No. </label>
							<input class="form-control" type="text" name="FCP_ISSN" /> 
						<label>No. of Co-authors </label>
							<input class="form-control" type="text" name="FCP_NOC" /> 
						 <label> Whether you are the main Author</label>
						 <input type="radio" name="FCP_YN" />Yes <input type="radio" name="FCP_YN"/>No<br /> 
							
						<label>API Score </label>
							<input class="form-control" type="text" name="FCP_API" /> 
					  </div>
						<br><input class="btn btn-md btn-primary" type="submit" value="Save" name="fpcp_save" />
						<select name="fp" onChange="showUser(this.value, this.name)">
							<option>--Title--</option>
							<?php 
								$sql3 = mysqli_query($con,"SELECT * from teach_fcp where year='$year' and user_id='$user'");
								while($row = mysqli_fetch_assoc($sql3)){
									?><option><?php echo $row['Teach_FCP_TNO']; ?></option>
							<?php } ?>
						</select>
						<input class="btn btn-md btn-primary" type="button" value="Delete" name="fcp_delete" /> 
						<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
					</form> 
				
			
        </div><!--End Of col-md-6 --> 
		
		
			
    </div><!--End Of row-fluid Class --> 
</div>
<!--End Of container --> 
<?php
	      include('jsLinks.php');
		  }
		  else{
		     header('location:index.php');
	      }
     ?>

	 
	 <!--JavaScript code for dynamically showing records using AJAX-->
	 <script>
		function showUser(value, name)
		{
		if (value=="")
		  {
		  document.getElementById("fp").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{  
				
				if(name == 'fp'){
					document.getElementById("fullPapersConf").innerHTML=xmlhttp.responseText;
				}	
			}
		  }
		xmlhttp.open("GET","form_process/rpac_show.php?val="+value+"&name="+name,true);
		xmlhttp.send();
		}
	</script>
</body>
</html>                                		