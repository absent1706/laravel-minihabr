PNotify.prototype.options.styling = "bootstrap3";
function notify(text, status, autohide, icon) {
    if (status   === undefined) status = 'info';
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

// default AJAX error handler
$( document ).ajaxError(function(event, jqXHR, settings, thrownError) {
    // try to obtain response as JSON
    var responseJson = jqXHR.responseJSON;

    // obtain response text. if it's a JSON, prettify it
    var responseText = (responseJson) ? JSON.stringify(responseJson,null,2) : jqXHR.responseText; // it's OK even if response is a regular string
    console.log(responseText);

    // if error is form validation error, collect all errors to array and display them as notification
    if (responseJson && jqXHR.status == 422) {
        var errors = [];
        for(var field in responseJson) {
            errors.push(responseJson[field]);
        }
        notify(errors.join('<br/>'), 'error');
    }
    // for other errors just throw common error notification
    else {
        notify('Sorry, some error occured', 'error');
    }

});
