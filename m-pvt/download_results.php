<?php 
    $data = "";
    
    $con = mysqli_connect("csmysql.cs.cf.ac.uk", "c0919382","xjD2RmSH", "c0919382");
    
    $results_retrieve = "SELECT * FROM PVT_results;";
    
    $results = mysqli_query($con, $results_retrieve);

    if (mysqli_num_rows($results) > 0) 
        {
                        
            while($result_row = mysqli_fetch_assoc($results)) 
            {   

                $id = $result_row["id"];
                $date = $result_row["date"];
                $trial_name = $result_row["trial_name"];
                $participant_id = $result_row["participant_id"];
                $trial_type = $result_row["trial_type"];
                $trial_time = $result_row["trial_time_ms"];
                $early_clicks = $result_row["early_clicks"];
                
                $participant_split = explode("_",$participant_id);

                $data .= $participant_split[0].',';
                $data .= $id.',';
                $data .= $participant_split[1].',';
                $data .= $date.',';
                $data .= $trial_time.',';
                $data .= $early_clicks.',';
                $data .= $trial_type.',';
                
                $data .= "\n";
            }
        }
    
    mysqli_close($con);
                        
    header("Content-type: text/plain",true);
    header("Content-Disposition: attachment; filename=pvt_results.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    ob_end_clean();
    echo $data;