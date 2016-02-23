$(function(){

var id = $('#actual_title option:selected').data('id');
 	$.ajax({
 		type: 'POST',
 		url:'../js/ajax_get_billets.php',
 		data: {billets: id},
 		timeout: 3000,
 		success: function(data){
 			var parsed = jQuery.parseJSON(data);
 			$('#new_title').val(parsed.title);
 			$('#new_content').val(parsed.content);
 		},
 		error: function(){
 			alert('La requete n\'a pas aboutie.')
 		}
 	});


 $('#actual_title').change(function(){
 	var id = $('#actual_title option:selected').data('id');
 	$.ajax({
 		type: 'POST',
 		url:'../js/ajax_get_billets.php',
 		data: {billets: id},
 		timeout: 3000,
 		success: function(data){
 			var parsed = jQuery.parseJSON(data);
 			$('#new_title').val(parsed.title);
 			$('#new_content').val(parsed.content);
 		},
 		error: function(){
 			alert('La requete n\'a pas aboutie.')
 		}
 	});
 });

});