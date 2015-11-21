PNotify.prototype.options.styling = "bootstrap3";
function notify(text, status, autohide, icon) {
    if (status   === undefined) status = 'success';
    if (autohide === undefined) autohide = true;
    if (icon     === undefined) icon = false;

    new PNotify({
        title: false,
        delay: 5000,
        type: status,
        text: text,
        hide: autohide,
        icon: icon,
        buttons: {
            sticker: false
        }
    });
}

app = {
    removeFormErrors: function (form)     {
        $(form).find('.form-group').find('.help-block').remove();
        $(form).find('.form-group').removeClass('has-error');
    },

    // default AJAX error handler
    defaultAjaxError: function (form, jqXHR) {
        // try to obtain response as JSON
        var errors = jqXHR.responseJSON;

        // obtain response text. if it's a JSON, prettify it
        var responseText = (errors) ? JSON.stringify(errors,null,2) : jqXHR.responseText; // it's OK even if response is a regular string
        console.log(responseText);

        // if error is form validation error, collect all errors to array and display them as notification
        if (errors && jqXHR.status == 422) {
            $(form).find(':input').each(
                function(index){
                    var field = $(this);
                    var fieldname = $(this).attr('name');
                    if(errors.hasOwnProperty(fieldname )) {
                       field.after('<p class="help-block">'+errors[fieldname]+'</p>');
                       field.closest('.form-group').addClass('has-error');
                    }
                }
            );
        }
        // for other errors just throw common error notification
        else {
            notify('Sorry, some error occured', 'error');
        }
    }
}

$(document).ajaxSend(function(event, request, settings) {
    $('.loading-indicator').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('.loading-indicator').hide();
});