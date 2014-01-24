<?php
	session_start();
	include('DBConnect.php');
	include('form_process/teachingProcess.php');
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
  ?>
</head>

<body>
	<?php
		if(isset($_SESSION['username'])){
			echo '<div id="wrap">';
			include('header.php');
     ?>
	 	<div class="container" style="background-color:#FFFFFF;">
	 		<h3 align="center">Teaching Learning And Evaluation Related Activities</h3>
			 <div class="row" style=" margin-bottom:50px;">

			 	<div class="col-sm-3" style="box-shadow:5px 5px 5px #888888; padding-bottom:55px;">
			 		<br><br><br><br>
			 		<li class="active"><a href="teachingLearningActivities.php">Lectures, Seminar,Tutorial, Practical, Contact Hours</a><br><br></li>
					<a href="rimc.php">Reading/Instructional material consulted and additional knowledge resources provided to students</a><br><br>
	   			 	<a href="tlm.php">Use of participatory and innovative Teaching-Learning Methodologies, Updating of subject contents</a><br><br>
					<a href="edap.php">Examination Duties Assigned and Performed</a><br><br>
				 		
			 	</div>
			 	<div class="col-sm-1"></div>
			 	
	   		 	<div class="col-sm-8">
	   		 		<br>
					
					<h5 align="center">  Lectures, Seminar,Tutorial, Practical, Contact Hours</h5>
			   		<form role="form" name="lectures" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="lectureForm">
			   			<div class="form-group">
							<div id="lect"><br/>
		          				<label>Course / Paper </label>
				    			<input type="text" data-bind="value: lstpcourse" class="form-control required" name="course" title="Please Enter Course Name">
                  				<br /><label>Level</label>
				    			<input type="text" data-bind="value: lstplevel" class="form-control required" name="level" title="Please Enter The Level"/>
		          					<br /><label>Mode Of Teaching</label>
				    					<input type="text" data-bind="value:lstpmot " class="form-control required" name="teachingModes" title="Please Enter Teaching Mode"/>
		   		  					<br /><label> No. of Classes/per Week Allocated</label>
				    					<input type="text" data-bind="value:lstpnoc " class="form-control required" name="classAllocated" title="Please Enter No. Of Class Allocated"/>
		      	  					<br /><label>Total Number of Classes Conducted</label>
				    					<input type="text" data-bind="value: lstptnoc" class="form-control required" name="classConducted" title="Please Enter Total No. of Conducted Classes"/>
				  					<br /><label>Practicals</label> 
				    					<input type="text" data-bind="value:lstppracticals " class="form-control required" name="practicals" title="Please Enter Practicles">
                  					<br /><label>% of Classes Taken AS Per Documented Record</label>
				    					<input type="text" data-bind="value: lstpctdr" class="form-control required" name="classTakenRecord" title="Please Enter the % value"/>
		          					<br /><label>Classes Taken (max 50 for 100% Performance and Proportionate Score upto 80% Performance, below which no Score may be given)</label>
				    					<input type="text" data-bind="value: lstpctapi" class="form-control required" name="classTaken" title="Please Enter Classes Taken"/>
		   		 					<br /><label>Teaching Load in Excess of UGC norm(max score : 10)</label>
				    					<input type="text" data-bind="value: lstptlapi" class="form-control required" name="teachingLoads" title="Please Enter Teaching Load"/>
			 					 </div><!--End of lect id -->
			 				
							       <br><input data-bind="click: savelstp" class="btn btn-primary" type="submit" value="Save" name="lectSave" />
									<input type="submit" class="btn btn-primary"  value="Delete" name="lectDelete" />
									<input type="reset" class="btn btn-primary" value="Reset" name="reset" />
								</div><!--End of form-group class -->
		    				</form>	     
	         
				</div><!--End of col-sm-9 class -->
				<!--End of col-sm-3 class -->
			</div><!--End of row class -->
	 	 </div><!--End of container class -->
	</div><!--end of wrap id -->

	<script src="js/knockout-2.3.0.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>

	 <?php
	      	include('footer.php');
	        include('jsLinks.php');
	?>



<script>
		$(document).ready(function() {
 			$('#lectureForm').validate();
			$('#resourceForm').validate();
			$('#innovationForm').validate();
			$('#dutiesForm').validate();
			
 		}); // end ready()
	</script>
	<script>
		function showUser(value, name)
		{
			if (value=="")
  			{
  				document.getElementById("lect").innerHTML="";
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
					if(name == "lect"){
        			    document.getElementById("lect").innerHTML=xmlhttp.responseText;	
					}
					if(name == "course"){
						document.getElementById("res").innerHTML=xmlhttp.responseText;
					}
					if(name == "desc"){
        			    document.getElementById("inno").innerHTML=xmlhttp.responseText;	
					}
					if(name == "dut"){
        			    document.getElementById("duty").innerHTML=xmlhttp.responseText;	
					}
    			}
  			}
			xmlhttp.open("GET","form_process/teachingShow.php?val="+value+"&name="+name,true);
			xmlhttp.send();
		}
	</script>


	<script>
	
		<!-- First we need to have a model that represents the data available for each student -->
		var lstpModel = function(id, name, age){
			var self = this; //caching so that it can be accessed later in a different context
			  this.course = ko.observable(course); //unique id for the student (auto increment primary key from the database)
			  this.level = ko.observable(level); //name of the student
			  this.mot = ko.observable(mot);
			  this.noc = ko.observable(noc);
			  this.tnoc = ko.observable(tnoc);
			  this.practicals = ko.observable(practicals);
			  this.ctdr = ko.observable(ctdr);
			  this.ctapi = ko.observable(ctapi);
			  this.tlapi = ko.observable(tlapi);

			 };
		
		<!--Next is the model in which the knockout.js bindings will be applied-->
		var model = function(){
			var self = this; //cache the current context
			this.lstpcourse= ko.observable(""); 
			this.lstplevel = ko.observable("");
			this.lstpmot = ko.observable("");
			this.lstpnoc = ko.observable("");
			this.lstptnoc = ko.observable("");
			this.lstppracticals = ko.observable("");
			this.lstpctdr = ko.observable("");
			this.lstpctapi = ko.observable("");
			this.lstptlapi = ko.observable("");
			
			this.lstp = ko.observableArray([]); 
			this.savelstp = function(){
			  if(self.validatelstp()){ //if the validation succeeded
			  
				  //build the data to be submitted to the server
				  var lstpdata = {'course' : this.lstpcourse(), 'level' : this.lstplevel(), 'mot': this.lstpmot(), 'noc' : this.lstpnoc(), 'tnoc':this.lstptnoc(), 'practicals':this.lstppracticals(),  'ctdr':this.lstpctdr(),
				  	 'ctapi':this.lstpctapi(), 'tlapi':this.lstptlapi() };

				  
				  //submit the data to the server        
				  $.ajax(
					  {
						  url: 'teachinglearning_save.php',
						  type: 'POST',
						  data: {'lstparray' : lstpdata, 'action' : 'insert'},
						  success: function(id){//id is returned from the server
						  
							  //push a new record to the student array
							  self.lstp.push(new lstpModel(id, self.lstpcourse(), self.lstplevel(), self.lstpmot(), self.lstpnoc(),self.lstptnoc() ,self.lstppracticals(), self.lstpctdr(), self.lstpctapi(), self.lstptlapi()
							  	));
							  
							  self.lstpcourse("");
							  self.lstplevel("");
							   self.lstpmot(""); 
							   self.lstpnoc("");
							   self.lstptnoc("");
							   self.lstppracticals("");
							   self.lstpctdr(""); 
							   self.lstpctapi("");
							   self.lstptlapi("");

							  
						  }
					  }
				  );           
				  
			  }else{ //if the validation fails
				  alert("Name and age are required and age should be a number!");
			  }
			};
			
			this.validatelstp = function(){
			  if(self.person_name() !== "" && self.person_age() != "" && Number(self.person_age()) + 0 == self.person_age()){
				  return true;
			  }
			  return false;
			};
			
			this.loadData = function(){

			  //fetch existing student data from database
			 $.ajax({
				  url : 'refresher_save.php',
				  dataType: 'json',
				  success: function(data){ //json string of the student records returned from the server
					  
					  for(var x in data){

						  //student details
						  var id = data[x]['id'];
						  var name = data[x]['name'];
						  var age = data[x]['age'];

						  //push each of the student record to the observable array for 
						  //storing student data
						  self.people.push(new lstpModel(id, name, age));
					  }
					  
				  }
			  });  

			};
			
			this.removePerson = function(person){
  
			    $.post(
				    'refresher_save.php',
				    {'action' : 'delete', 'student_id' : person.id()},
				    function(response){
					  
					    //remove the currently selected student from the array
					    self.people.remove(person);
				  }
			    );
			};
			
			this.updatePerson = function(person){
			  //get the student details
			  var id = person.id();
			  var name = person.name();
			  var age = person.age();

			  //build the data
			  var student = {'id' : id, 'name' : name, 'age' : age};
			  
			  //submit to server via POST
			  $.post(
				  'refresher_save.php',
				  {'action' : 'update', 'student' : student}
			  );
			};


		};
		
		//Then we just apply the knockout.js bindings to the model. This simply means that we're binding the UI to the model
		//so that any changes to the model will also update the UI.
		ko.applyBindings(new model());
		
	</script>



	<?php
		  }
		  else{
		     header('location:index.php');
	      }
     ?>
</body>
</html>
