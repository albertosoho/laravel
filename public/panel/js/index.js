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

	/*counter = 0;
	$('.drag').draggable({
		helper: 'clone',
		revert:'invalid',
		//When first dragged
		stop: function (ev, ui) {
			var pos = $(ui.helper).offset();
			objName = '#clonediv' + counter
			$(objName).css({
				'position':'relative'
			});
			$(objName).removeClass('drag');
			//When an existiung object is dragged
			$(objName).draggable({
				containment: 'parent',
				stop: function (ev, ui) {
					var pos = $(ui.helper).offset();
					console.log($(this).attr('id'));
					console.log(pos.left)
					console.log(pos.top)
				}
			});
		}
	});

	//Make element droppable
	$('.destacados').droppable({
		drop: function (ev, ui) {
			lis = $('.destacados > li').length;
			if(lis < 5){
				if (ui.helper.context.id.search(/item-([0-9]*)/g) != -1) {
					counter++;
					var element = $(ui.draggable).clone();
					element.addClass('tempclass');
					$(this).append(element);
					$('.tempclass').attr('id', 'clonediv' + counter);
					$('#clonediv' + counter).removeClass('tempclass');
					console.log(ui.helper.context.id.search(/item-([0-9]*)/g));
					//Get the dynamically item id
					draggedNumber = ui.helper.context.id.search(/item-([0-9]*)/g);
					itemDragged = 'dragged' + RegExp.$1;
					console.log(itemDragged);
					$("#clonediv" + counter).addClass(itemDragged);
				}
			}
		},
	});*/
	
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