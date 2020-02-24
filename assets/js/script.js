$(function() {
   $('#confirm_password').on('change keyup paste', function(){
       var npass = $('#password').val();
       var cpass = $(this).val();

       if(npass == cpass) {
           $(this)[0].setCustomValidity('');
       }
       else {
            $(this)[0].setCustomValidity("Password didn't match."); //'password didnot match, or 'password didn/'t match.
       }
   }) ;


    $('.delete').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href'); // $(this) le jun click bhako tei indicate garchha

        if(confirm('Are you sure you want to delete this item?')) {
         location.href = url;
        }
    });

    $('#featured_image').change(function(){
        var file = $(this)[0].files[0];
        var reader = new FileReader();

        reader.readAsDataURL(file);

        reader.onload = function(e) {
            var image = e.currentTarget.result;

            $('.img-preview').html('<img src="' + image + '"class="img-fluid preview">');

        }
    });

    $('.datetime').datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss'
    });

});