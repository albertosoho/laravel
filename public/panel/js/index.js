$(document).ready(function(){
	$('#login').submit(function(){
		console.log($(this).serialize());
		$.ajax({
			type:'POST',
			url:$(this).attr('action'),
			data:$(this).serialize(),
		})
		.done(function(msg){
			if(msg == 'login exitoso'){
				window.location = 'appanel/index';
			}else{
				$('#error').text('La contraseña o el nombre de usuario son incorrectos');
			}
		});
		return false;
	});
});