$.noConflict();

jQuery( document ).ready(function( $ ) {

    $('#thumbnail').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file .custom-file-label').html(fileName);
    });

});