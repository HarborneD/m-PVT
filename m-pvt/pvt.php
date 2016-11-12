<!DOCTYPE html>

<?php
//Edit these values to configure the defaults for the test
$practise_trials = isset($_GET['practise_trials']) ? (int)$_GET['practise_trials'] : 3;
$max_trials = isset($_GET['max_trials']) ? (int)$_GET['max_trials'] : 53;
$test_identifier = isset($_GET['test_identifier']) ? (string)$_GET['test_identifier'] : "";
$test_name = isset($_GET['test_name']) ? (string)$_GET['test_name'] : "";
$participant_id = isset($_GET['participant_id']) ? (string)$_GET['participant_id'] : uniqid();

$total_trial_string = (string)($max_trials + $practise_trials);
$total_time_string = (string)(round(($max_trials * 5.5)/60));
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PVT Test<?php if($test_identifier != ""){echo' - '.$test_identifier;}?></title>

    <link rel="stylesheet" href="css/pvt.css" type="text/css">
    <link rel="stylesheet" href="css/forms.css" type="text/css">

</head>

<body>
    <div class="container body-content">

        <div id="task_container" class="task_container">
            <input type="hidden" value=<?php echo'"'.$participant_id.'"'; ?> id="participant_id" />
            <div class="PVT_window">
                <input id="PVT_Test_Start" type="hidden" value=0 />
                <input id="PVT_Timer_On" type="hidden" value=0 />
                <input id="PVT_Max_trials" type="hidden" value=<?php echo$max_trials; ?>>
                <input id="PVT_practise_trials" type="hidden" value=<?php echo$practise_trials; ?>>
                <input id="PVT_Result_Count" type="hidden" value=0 />
                <input id="PVT_Early_Click" type="hidden" value=0 />
                <input id="PVT_early_clicks" type="hidden" value=0 />
                <input id="PVT_trial_name" type="hidden" value=<?php echo'"'.$test_identifier.'"'; ?>/>
                <input id="PVT_trial_results_string" type="hidden" value="" />

                <div class="PVT_display">

                    <div id="PVT_Start_Msg">
                        <h4>REACTION TIME TEST</h4>

                        <p>You are going to be shown a black screen. At the centre of the screen, you will be shown a red circle for between 2 – 10 seconds followed by a timer.</p>

                        <p>Please TAP on the screen as soon as the timer starts counting.</p>

                        <p>There will be <?php echo$max_trials;?> trials in total, which will take approximately <?php echo$total_time_string;?> minutes to complete.</p>

                        <p>Please respond as quickly as possible.</p>
                        
                        <p>Thank you.</p>

                    </div>

                    <span id="PVT_Cross" class="vertical_centre">X</span>

                    <span id="PVT_Dot" class="vertical_centre"><img src="images/red-circle.svg" class="red_circle"/></span>

                    <div id="PVT_Timer" class="vertical_centre">
                    </div>

                 
                </div>
                <div id="PVT_Start_Container">
                    <input id="PVT_start_button" class="form_submit_button" type="button" value="Start" onclick="PVT_Start_Test()" />
                </div>

                <div id="PVT_Early_Msg">
                    <span id="PVT_Early_Text">You clicked too early! This trial will be reset.</span>
                </div>
          
          


                <div id="PVT_Results_Container">
                    <span id="PVT_average_text">Your Average Reaction Time:</span>
                    <span id="PVT_average_time"></span>
                    <!-- .'&participant_id='.end(explode('_',$participant_id)) -->
                    <a href="trial_setup.php?<?php echo'practise_trials='.$practise_trials.'&max_trials='.$max_trials.'&test_name='.$test_name.'&test_identifier='.$test_identifier; ?>"><input id="PVT_quit_button" class="form_submit_button" type="button" value="Quit"></a>
                </div>
            </div>


         

        </div>
    </div>
</body>

<script src="scripts/jquery.js"></script> 
<script src="scripts/PVT.js"></script> 

</html>