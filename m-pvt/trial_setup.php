<!DOCTYPE html>
<?php
	//first check the post values, if not present assign a default
	//edit the values after the colon to set defaults
	$practise_trials = isset($_POST['practise_trials']) ? (int)$_POST['practise_trials'] : 3;
	$max_trials = isset($_POST['max_trials']) ? (int)$_POST['max_trials'] : 53;
	$test_name = isset($_POST['test_name']) ? (string)$_POST['test_name'] : "Cardiff University - Open Day"; //for the header
	$test_identifier = isset($_POST['test_identifier']) ? (string)$_POST['test_identifier'] : "open day - date_unspecified"; //for the data
	$participant_id = isset($_POST['participant_id']) ? (string)$_POST['participant_id'] : ""; //participant id pre type prefix

	//now check the get values and use them instead if present
	$practise_trials = isset($_GET['practise_trials']) ? (int)$_GET['practise_trials'] : $practise_trials;
	$max_trials = isset($_GET['max_trials']) ? (int)$_GET['max_trials'] : $max_trials;
	$test_name = isset($_GET['test_name']) ? (string)$_GET['test_name'] : $test_name; //for the header
	$test_identifier = isset($_GET['test_identifier']) ? (string)$_GET['test_identifier'] : $test_identifier; //for the data
	$participant_id = isset($_GET['participant_id']) ? (string)$_GET['participant_id'] : $participant_id; //participant id pre type prefix
	
?>
<html>

	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <title>PVT Test<?php if($test_name != ""){echo' - '.$test_name;}?></title>

	    <link rel="stylesheet" href="css/pvt_setup.css" type="text/css">
	     <link rel="stylesheet" href="css/site.css" type="text/css">
	      <link rel="stylesheet" href="css/forms.css" type="text/css">

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>

	<body>

	    <div class="container body-content">
	    	<div id="pvt_setup_container">
	    		<img id="school_banner" src="images/school_banner.jpg"/>
		    	<!-- <h1>School of Psychology <img id="cardiff_logo" src="images/cardiff_logo.png"/></h1> -->
		    	<h2>Psychomotor Vigilance Task (PVT)</h2>
		    	<h2><?php echo$test_name; ?></h2>
				<form class="PVT_form" action="pvt.php" onsubmit="return validate_trial_setup_form()" method="get">
					<input id="PVT_Max_trials" name="max_trials" type="hidden" value=<?php echo$max_trials; ?>>
	                <input id="PVT_practise_trials" name="practise_trials" type="hidden" value=<?php echo$practise_trials; ?>>
	                <input id="PVT_trial_name" name="test_name" type="hidden" value=<?php echo'"'.$test_name.'"'; ?>/>
	                <input id="PVT_test_identifier" name="test_identifier" type="hidden" value=<?php echo'"'.$test_identifier.'"'; ?>/>
	                <input id="PVT_participant_id" name="participant_id" type="hidden" value=<?php echo'"_'.$participant_id.'"'; ?>/>
	                
	                <div id="PVT_participant_type_container" class="field_outter_container">
		    			<div class="form_field_container">
			                <label class="form_field_above_label" for="PVT_participant_type">Session Type:</label>
			                <select class="form_field_input" id="PVT_participant_type" >
			                	<option value="">Select Session</opetion>
			                	<option value="LW1_">Low 1</opetion>
			                	<option value="LW2_">Low 2</opetion>
			                	<option value="MD1_">Medium 1</opetion>
			                	<option value="MD2_">Medium 2</opetion>
			                	<option value="HG1_">High 1</opetion>
			                	<option value="HG2_">High 2</opetion>
			                	<option value="OPN_">Open Day</opetion>
			                	
			                </select>
			            </div>

			            <div id="PVT_participant_type_status" class="form_field_status valid_status">
                                <i id="PVT_participant_type_symbol" class="form_status_symbol fa fa-check-circle-o"></i> 
                                <span id="PVT_participant_type_msg" class="form_field_msg"></span>
                        </div>
			        </div>

			        <div id="PVT_participant_id_container" class="field_outter_container">
		    			<div class="form_field_container">
			                <label class="form_field_above_label" for="PVT_participant_id_entry">ID:</label>
			                <input type="tel" class="form_field_input" id="PVT_participant_id_entry" value=<?php echo'"'.$participant_id.'"';?>/>
			            </div>

			            <div id="PVT_participant_id_entry_status" class="form_field_status valid_status">
                                <i id="PVT_participant_id_entry_symbol" class="form_status_symbol fa fa-check-circle-o"></i> 
                                <span id="PVT_participant_id_entry_msg" class="form_field_msg"></span>
                        </div>
			        </div>

			        <div id="PVT_participant_id_confirm_container" class="field_outter_container">
		    			<div class="form_field_container">
			                <label class="form_field_above_label" for="PVT_participant_id_confirm_entry">Confirm ID: (As above)</label>
			                <input type="tel" class="form_field_input" id="PVT_participant_id_confirm_entry" value=<?php echo'"'.$participant_id.'"';?>/>
			            </div>

			              <div id="PVT_participant_id_confirm_entry_status" class="form_field_status valid_status">
                                <i id="PVT_participant_id_confirm_entry_symbol" class="form_status_symbol fa fa-check-circle-o"></i> 
                                <span id="PVT_participant_id_confirm_entry_msg" class="form_field_msg"></span>
                        </div>
			        </div>
			            	



					<input id="PVT_setup_submit" class="form_submit_button" type="submit" value="Start Trial" onclick="PVT_id_merge()"/>

				</form>
			</div>
		</div>

	</body>
</html>

<script src="scripts/jquery.js"></script> 
<script src="scripts/pvt_setup.js"></script> 