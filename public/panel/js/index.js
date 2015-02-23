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

	$('.destacados').sortable({
		revert: true
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
			lis = $('.destacados > div').length;
			if(lis < 5){
				var obj;
				id = $(ui.helper).data('item');
				if(id != undefined){
					img = $(ui.helper).find('.activator').attr('src');
					title = $(ui.helper).find('.card-image .card-title').text();

					el = $('<div>').addClass('list').attr('data-id', id).css({
						'background-size':'cover',
						'background':'url('+img+') center',
					});
					el.append($('<h3>').text(title));
					el.append($('<span>').addClass('remove').text('x'));

					$(this).append(el);
				}
			}

			$(this).find('h5').hide();

			saveDestacados();
		}
	});

	function saveDestacados(){
		url = $('.destacados').data('send');
		elements = $('.destacados > div');
		obj = {
			"destacados":[{
				"1":{},
				"2":{},
				"3":{},
				"4":{},
				"5":{}
			}]
		};
		i = 1;
		$.each(elements, function(key, value){
			div = $(value);
			id = div.attr('data-id');
			if (id != undefined){
				pos = i;
				obj.destacados[pos] = id;
				i++;
				console.log(obj);
			}
		});
		$.ajax({
			type: "POST",
			url: url,
			data: {'positions':obj},
			success: function(){},
			dataType: "json",
		});
	}

	$(document).on('click', '.remove', function(e){
		e.preventDefault()
		parent = $(this).parent().remove();
		saveDestacados();
	});
});