function editPINForm() {
    var form = $('#editPINFormulary'),
        active = 0,
        top = $(window).scrollTop(),
        boton = $('#editPIN');

    form.submit(function(event) {
        event.preventDefault();
        if (active == 0) {
            active = 1;
            data = form.serialize();
            $.ajax({
                url: '/hk/forms/editPIN',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $('#forerror').html('<div class="loader_error"></div>');
                    boton.attr('disabled', true);
                },
                success: function(error) {
                    $('#forerror').html(' ');
                    if (error.indexOf('exitosamente') == -1) {
                        demo.showNotification('top','right', error, 'danger', 'error');
                    } 

                    if (error.indexOf('exitosamente') != -1) {
                        demo.showNotification('top','right', error, 'success', 'check');
                    }

                    setTimeout(function () {
                        active = 0;
                        boton.attr('disabled', false);
                        document.getElementById('editPINFormulary').reset();
                    }, 500);
                }
            });
        }
    });
    $('#forerror .alert button[data-dismiss="alert"]').click(function(event) {
        event.preventDefault();
        $('#forerror').hide('blind', 300);
    });
}

function editClientPINForm() {
    var form = $('#editClientPINFormulary'),
        active = 0,
        top = $(window).scrollTop(),
        boton = $('#editClientPIN');

    form.submit(function(event) {
        event.preventDefault();
        if (active == 0) {
            active = 1;
            data = form.serialize();
            $.ajax({
                url: '/hk/forms/editClientPIN',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){
                    $('#forerror2').html('<div class="loader_error"></div>');
                    boton.attr('disabled', true);
                },
                success: function(error) {
                    $('#forerror2').html(' ');
                    if (error.indexOf('exitosamente') == -1) {
                        demo.showNotification('top','right', error, 'danger', 'error');
                    } 

                    if (error.indexOf('exitosamente') != -1) {
                        demo.showNotification('top','right', error, 'success', 'check');
                    }

                    setTimeout(function () {
                        active = 0;
                        boton.attr('disabled', false);
                        document.getElementById('editClientPINFormulary').reset();
                    }, 500);
                }
            });
        }
    });
    $('#forerror .alert button[data-dismiss="alert"]').click(function(event) {
        event.preventDefault();
        $('#forerror').hide('blind', 300);
    });
}