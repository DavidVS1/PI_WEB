$("form").validate({ errorPlacement: function(error, element) {} });

$('form').on('submit', function(){
	if($('.table tbody tr').length == 0){
		$.confirm({
		    title: 'Error al guardar el platillo',
		    content: 'Debe agregar al menos un ingrediente al platillo',
		    type: 'red',
		    typeAnimated: true,
		    buttons: {
		        tryAgain: {
		            text: 'Entendido',
		            btnClass: 'btn-info',
		            action: function(){
		            }
		        }
		    }
		});

		return false;
	}else
		return true;
});

$('.btn-add-ingrediente').on('click', function(){
	var ingrediente = $('select[name="ingredientes"]').find(':selected');

	if (ingrediente.val() > 0){
		var html = '';
		html += '<tr>';
			html += '<td class="text-center"><button type="button" class="btn btn-danger btn-xs btn-delete-ingrediente">X</button></td>';
			html += '<td>' + ingrediente.text() + '</td>';
			html += '<td>' + ingrediente.attr('unidad') + '</td>';
			html += '<td class="col-xs-4">';
				html += '<input type="number" step=".1" value="0" name="cantidad[]" class="form-control">';
				html += '<input type="hidden" readonly value="' + ingrediente.val() + '" name="ingrediente[]" class="form-control">';
			html += '</td>';
		html += '</tr>';

		$('.table tbody').append(html);	
		$('option[value="' + ingrediente.val() + '"]').hide();

		$('select[name="ingredientes"]').val('');
	}
	
});

$('.table').on('click', '.btn-delete-ingrediente', function(){
	var ingrediente = $(this).parent().parent().find('input[type="hidden"]');

	//console.log(ingrediente);
	$('option[value="' + ingrediente.val() + '"]').show();	

	$(this).closest('tr').remove();
});