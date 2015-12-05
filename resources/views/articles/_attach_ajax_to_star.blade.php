<script>
// attach event to dynamically created elements
$(document).on('submit', '.form-from-link.star-link', function(e) {
    e.preventDefault();
    form = this;
    $.ajax({
        type: form.method,
        url:  form.action,
        data: $(form).serialize(),
        dataType: 'json',
        success: function( result ) {
            // replace star container html by the new one came from server and notify success
            var articleId = $(form).data('articleId');
            var container = $('.article-star-container[data-article-id="' + articleId + '"]');
            container.hide().after(result.html).remove();

            notify(result.flash_message, result.flash_class);
        },
        error: function(jqXHR) {app.defaultAjaxError(form, jqXHR);}
    });
});
</script>
