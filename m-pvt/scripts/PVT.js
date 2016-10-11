var Stopwatch = function (elem, options) {
  
  var timer       = createTimer(),
      offset,
      clock,
      interval;
  
  // default options
  options = options || {};
  options.delay = options.delay || 1;
 
  // append elements     
  elem.appendChild(timer);

  
  // initialize
  reset();
  
  // private functions
  function createTimer() {
    t = document.createElement("span");
    t.id="PVT_time";
    return t
  }
  
  function createButton(action, handler) {
    var a = document.createElement("a");
    a.href = "#" + action;
    a.innerHTML = action;
    a.addEventListener("click", function(event) {
      handler();
      event.preventDefault();
    });
    return a;
  }
  
  function start() {
    if (!interval) {
      document.getElementById('PVT_Timer_On').value = 1;
      offset   = Date.now();
      interval = setInterval(update, options.delay);
    }
  }
  
  function stop() {
    if (interval) {
      document.getElementById('PVT_Timer_On').value = 0;
      clearInterval(interval);
      interval = null;
    }
  }
  
  function reset() {
    clock = 0;
    render(0);
  }
  
  function update() {
    clock += delta();
    render();
    if(clock > 5000)
    {
      process_click();
    }
  }
  
  function render() {
    timer.innerHTML = clock; 
  }
  
  function delta() {
    var now = Date.now(),
        d   = now - offset;
    
    offset = now;
    return d;
  }
  
  // public API
  this.start  = start;
  this.stop   = stop;
  this.reset  = reset;
};


// basic examples
var elems = document.getElementsByClassName("basic");

for (var i=0, len=elems.length; i<len; i++) {
  new Stopwatch(elems[i]);
}







function PVT_Test()
{
  document.getElementById("PVT_Test_Start").value = 1;

  document.getElementById("PVT_Timer_On").value = 0;
  document.getElementById("PVT_Result_Count").value = 0;
  
  document.body.addEventListener('mousedown', function (e)
  {
      
       
      if(e.buttons === 1){
          
          
          process_click();
      }
  })

  document.body.addEventListener('touchstart', function (e) {
      process_click();
  }, false);


  // programmatic examples
  var a = document.getElementById("PVT_Timer");
  PVT_Timer = new Stopwatch(a);
 

  //hide start msg & button
  document.getElementById("PVT_Start_Msg").style.display="none";
  document.getElementById("PVT_Start_Container").style.display="none";
  

  
  PVT_test_loop();


  

}

function process_click()
{
  var timer_on = document.getElementById("PVT_Timer_On").value;
  if(timer_on == 1)
  {
    PVT_Timer.stop();
    
    record_result();

    var timer_running = parseFloat(document.getElementById("PVT_time").innerHTML);
    
    result_count = document.getElementById("PVT_Result_Count").value;

    document.getElementById("PVT_Result_Count").value = parseInt(result_count) + 1;
    document.getElementById("PVT_early_clicks").value = 0;
    
    setTimeout(function ()
    {
        PVT_Timer.reset();
        document.getElementById("PVT_Timer").style.display = "none";
        if (parseInt(document.getElementById("PVT_Result_Count").value) < parseInt(document.getElementById("PVT_Max_trials").value))
        {
            setTimeout(function () { PVT_test_loop(); }, 500);
        }
        else
        {
            calculate_and_display_average();
            document.getElementById("PVT_Test_Start").value = 0;
        }
    }, 500);
  }
  else
  {
    if(document.getElementById("PVT_Test_Start").value == 1)
    {
        document.getElementById("PVT_Early_Click").value = 1;
        document.getElementById("PVT_early_clicks").value = parseInt(document.getElementById("PVT_early_clicks").value) +1;
        document.getElementById("PVT_Early_Msg").style.display = "block";
        document.getElementById("PVT_Dot").style.display = "none";
  }
  }

}

function PVT_Start_Test()
{
    launchIntoFullscreen(document.documentElement);

    var PVT_Results;

    PVT_Results = PVT_Test();


}

function PVT_test_loop()
{
    document.getElementById("PVT_Early_Click").value = 0;
    document.getElementById("PVT_Early_Msg").style.display="none";

    //code for cross at start
  //  document.getElementById("PVT_Dot").style.display="none";
  ////display fixation cross
  //document.getElementById("PVT_Cross").style.display="block";
  
  //display blank screen
 //   setTimeout(function(){
    //document.getElementById("PVT_Cross").style.display="none";
     
    setTimeout(function(){
      var dot_time =  Math.random() * (10000 - 1000) + 1000;
   document.getElementById("PVT_Dot").style.display="block";
   setTimeout(function ()
   {
       if (document.getElementById("PVT_Early_Click").value == 0)
       {
           document.getElementById("PVT_Dot").style.display = "none"; document.getElementById("PVT_Timer").style.display = "block"; PVT_Timer.start();
       }
       else
       {
           setTimeout(function () { PVT_test_loop(); }, 1000);
       }
   }, dot_time);

     },500);
  //},500);


    
  
}


function record_result()
{   
    var practise_trials = parseInt(document.getElementById("PVT_practise_trials").value);
    var trial_time = parseInt(document.getElementById("PVT_time").innerHTML);
    var participant_id = document.getElementById("participant_id").value;
    var early_clicks = parseInt(document.getElementById("PVT_early_clicks").value);
    var trial_name = document.getElementById("PVT_trial_name").value;
    var num_trials = parseInt(document.getElementById("PVT_Result_Count").value);
    var trial_type = "Test"
    
    if (num_trials < practise_trials)
    {
        trial_type = "Practise"
    }

    if(trial_type == "Test")
    {
      var result_string = $("#PVT_trial_results_string").val();

      if(result_string.length > 0)
      {
        result_string = result_string + ",";
      }

      result_string = result_string + trial_time;

      $("#PVT_trial_results_string").val(result_string);
    }

    $.ajax({
        url: "record_result.php",
        type: "POST",
        dataType: "json",
        data: { trial_time: trial_time, participant_id: participant_id, early_clicks: early_clicks, trial_type: trial_type, trial_name: trial_name },
        success: function (data) 
        {
          
            
        }
    })
}



function launchIntoFullscreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

function calculate_and_display_average()
{
  var result_string = $("#PVT_trial_results_string").val();
  var result_array = result_string.split(",");

  var total = 0;
  
  for(var i = 0; i < result_array.length; i++ )
  {
    total += parseInt(result_array[i],10);
  }

  var average = Math.round(total/result_array.length);

  $("#PVT_average_time").html(average);
  $("#PVT_Results_Container").css("display","block");


}