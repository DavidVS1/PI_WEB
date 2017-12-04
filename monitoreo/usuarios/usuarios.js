$('.btn-danger').on('click', function(){
    var href = $(this).attr('href');
    $.confirm({
        title: 'Confirmar eliminación',
        content: '¿Está seguro que desea eliminar este Usuario?',
        buttons: {
            confirm: {
                text: 'Si, deseo eliminarlo',
                btnClass: 'btn-success',
                action: function(){
                    window.location.href = href;
                }
            },
            cancel: {
                text: 'No, no deseo eliminarlo',
                btnClass: 'btn-default'
            }
        }
    });

    return false;
});
