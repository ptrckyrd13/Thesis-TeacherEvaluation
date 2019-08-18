
function add_department(ev){
	
	var f_data = new FormData(ev);
	
	$.ajax({
		type :'post', url:'set_data.php',
		data : f_data,
		cashe: false,
		contentType:false,
		processData:false,
		success : function(r){
			
			if(r == 'ok'){
				$('#department_additon_form')[0].reset();	
				$('#server_response').html('Department successfully addded.');	
			}else{
				$('#server_response').html(r);	
			}
		}
	});
	
	return false;
}

function add_student(ev){
	
	var f_data = new FormData(ev);
	
	$.ajax({
		type :'post', url:'set_data.php',
		data : f_data,
		cashe: false,
		contentType:false,
		processData:false,
		success : function(r){
			
			if(r == 'ok'){
				$('#department_additon_form')[0].reset();	
				$('#server_response').html('Department successfully addded.');	
			}else{
				$('#server_response').html(r);	
			}
		}
	});
	
	return false;
}