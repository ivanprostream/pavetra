(function($) {
    "use strict";

    // Summernote

    if ($("#summernote").length > 0) {

        $(document).ready(function() {
          $('#summernote').summernote({
            tabsize: 2,
            template: 'yeti',
            height: 400,
            // toolbar: [
            //   ['style', ['style']],
            //   ['font', ['bold', 'underline']],
            //   ['para', ['ul', 'ol', 'paragraph']],
            //   ['table', ['table']],
            //   ['insert', ['link']],
            //   ['view', ['fullscreen']]
            // ]
          });
        });
    }


    /* sortble */

    if ($("#sorting").length) {

        var sort_link = $('#sorting').val();

        $('table tbody').sortable({
        handle: 'td:first',
            update: function(e, ui){
            var newOrder = $(this).sortable("serialize");
            $.ajax({
            url: sort_link,
            method: "POST",
            data: {
                sort: newOrder,
                method: "PUT",
                _token: $("meta[name='csrf_token']").attr("content")
            }
            });
        }
        });
    }

})(jQuery);
