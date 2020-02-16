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

});