{{-- Hack for sending DELETE request when clicking on links with data-method='delete' --}}
{{-- CSRF token is also sent --}}

{{-- !!! uses  bootbox (http://bootboxjs.com/) --}}

<script>
  //  solution from http://stackoverflow.com/a/28420767
  $(function() {
    var laravel = {
      initialize: function() {
        $(document).on('click', 'a[data-method]', this.handleMethod);
      },

      handleMethod: function(e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var form;

        // If the data-method attribute is not PUT or DELETE,
        // then we don't know what to do. Just ignore.
        if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
          return;
        }

        e.preventDefault();

        // Allow user to optionally provide data-confirm="Are you sure to ...?"
        bootbox.confirm(link.data('confirm') || 'Are you sure?', function(confirmed) {
            if (confirmed) {
              form = laravel.createForm(link);
              form.submit();
            }
        });
      },

      createForm: function(link) {
        var form =
        $('<form>', {
          'method': 'POST',
          'action': link.attr('href'),
          'class':  'form-from-link ' + link.attr('class') // copy classes from link
        });

        // copy data attributes from link
        form.data( link.data() );

        var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
            'value': '{{ csrf_token() }}'
          });

        var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });

        return form.append(token, hiddenInput)
                   .appendTo('body');
      }
    };

    laravel.initialize();

  });
</script>