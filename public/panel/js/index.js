$(document).ready(function(){
	$('.login').submit(function(){
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

	$('.delete').click(function(e){
		e.preventDefault();
		$this = $(this);
		swal({
			title: '¿Estás seguro?',
			text: 'Esta acción no puede deshacerse',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '¡¡Perfecto!!',
			closeOnConfirm: true,
		}, function(){
			window.location = $this.attr('href');
		});
	});
	
	var new_id = 20;

	$('.drag').draggable({
		cursor: 'move',
		revert: 'invalid',
		helper: function () { 
			//alert($(this).attr('class'));

			var cloned = $(this).clone();
			cloned.attr('id', (++new_id).toString());

			return cloned;
		},
		distance: 20
	});

	$('.destacados').droppable({
		hoverClass: 'ui-state-active',
		tolerance: 'pointer',

		accept: function (event, ui) {
			return true;
		},
		drop: function (event, ui) {
			//alert($(this).parent().html());
			//alert($(ui.helper).attr('class'));
			var obj;
			if ($(ui.helper).hasClass('drag')) {
				//alert('draggable');
				obj = $(ui.helper).clone();  
				obj.removeClass('drag').addClass('editable').removeAttr('style');
				//obj.addClass('droppable');
				$(this).append(obj);
			}
		}
	}).sortable({
		revert: true
	});

	$(document).on('click', '.remove', function(e){
		e.preventDefault()
		parent = $(this).parent().remove();
	});
});