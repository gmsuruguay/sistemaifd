$(document).on('ready pjax:success', function() {
    $('.modalButton').click(function(e) {
        e.preventDefault(); //for prevent default behavior of <a> tag.
        var tagname = $(this)[0].tagName;
        $('#ModalId').modal('show').find('.modalContent').load($(this).attr('href'));
    });
});


// Mandar por ajax el formulario y refrescar el grid view o select.
function ajax(form, callback) {

    $.ajax({
            url: form.attr("action"),
            type: "post",
            data: form.serialize(),
            beforeSend: function() {
                $('#submit-control').html("<i class='fa fa-spinner fa-pulse fa-2x'></i> Procesando ...");
            }
        })
        .done(function(response) {
            if (response == 1) {
                //$form.trigger('reset');
                $(document).find('.modal').modal('hide');
                callback(); //for pjax update            

            } else {
                $('#message').html(response);
            }
        })
        .fail(function() {
            console.log('server error');
        })
        .always(function() {
            setTimeout(function() {
                $('#submit-control').hide();
            }, 3000);

        });

    return false;

}

function select(form, callback) {
    $.post(
            form.attr("action"), // serialize yii2 form
            form.serialize()
        )
        .done(function(result) {
            $(document).find('.modal').modal('hide');
            callback(result);

        })
        .fail(function() {
            console.log('server error');
        });
    return false;
}


function refrescarGridTitulo() {
    $.pjax.reload({ container: '#grid-titulo' });
}

function refrescarGridMateria() {
    $.pjax.reload({ container: '#grid-materia' });
}


function refrescarSelect(data) {
    $.pjax.reload({ container: '#select-alumno' });
    /*var data = $.parseJSON(data);
    var id= data.id;*/
}

function refrescarSelectLugar() {
    $.pjax.reload({ container: '#select-lugar', async: false });
    $.pjax.reload({ container: '#select-localidad', async: false });

}

function refrescarSelectLocalidad() {
    $.pjax.reload({ container: '#select-localidad' });
}

function refrescarSelectTitulo() {
    $.pjax.reload({ container: '#select-titulo' });
}

function refrescarSelectColegio() {
    $.pjax.reload({ container: '#select-colegio' });
}