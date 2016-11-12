window.onload = PVT_id_merge();

function PVT_id_merge()
{
	var type_string = $("#PVT_participant_type").val();
	var particpant_id_input = $("#PVT_participant_id_entry").val();
	var new_id = type_string + particpant_id_input;
	$("#PVT_participant_id").val(new_id);
}

function validate_trial_setup_form()
{
	var is_valid = true;

	if(!validate_session_type())
	{
		is_valid = false;
	}

	if(!validate_participant_id())
	{
		is_valid = false;
	}

	if(!validate_participant_id_confirm())
	{
		is_valid = false;
	}

	

	return is_valid;
}

function validate_session_type()
{
	var field =  document.getElementById('PVT_participant_type');
	
	var entry = field.value;

	var id = field.id;
	
	if(entry.length == 0)
	{
		update_input_status(id,false,"Required Field!");
		return false;
	}

	return true;
}

function validate_participant_id()
{
	var field =  document.getElementById('PVT_participant_id_entry');
	
	var entry = field.value;

	var id = field.id;
	
	if(entry.length == 0)
	{
		update_input_status(id,false,"Required Field!");
		return false;
	}

	var match = entry.match(/(\d)+/g);

	if(match == null)
	{
		update_input_status(id,false,"ID consists of digits only!");
		return false;
	}

	update_input_status(id,true,"ID ok!");
	return true;
}


function validate_participant_id_confirm()
{
	var field =  document.getElementById('PVT_participant_id_confirm_entry');
	
	var entry = field.value;

	var id = field.id;
	
	if(entry.length == 0)
	{
		update_input_status(id,false,"Required Field!");
		return false;
	}

	var id_field_value = document.getElementById('PVT_participant_id_entry').value;

	if(entry != id_field_value)
	{
		update_input_status(id,false,"The IDs entered must match!");
		return false;
	}

	update_input_status(id,true,"ID ok!");
	return true;
}




function update_input_status(input_id,is_valid,msg)
{
	//get_status_div
	var status_div = document.getElementById(input_id+"_status");

	//set_msg
	document.getElementById(input_id+"_msg").innerHTML  = msg;


	//set_symbol
	var symbol = document.getElementById(input_id+"_symbol");
	if(is_valid)
	{
		symbol.className = "form_status_symbol fa fa-check-circle-o";
		
		var existing_css = symbol.style.cssText || '';
		symbol.style.cssText = existing_css + ';display:inline-block !important;';
		

		//set_status_color
		status_div.className = "form_field_status valid_status";
		

	}
	else
	{
		symbol.className = "form_status_symbol fa fa-exclamation-triangle";
		
		var existing_css = symbol.style.cssText || '';
		symbol.style.cssText = existing_css + ';display:inline-block !important;';

		//set_status_color
		status_div.className = "form_field_status invalid_status";


	}
	//show_status
	status_div.style.display ="block";
}