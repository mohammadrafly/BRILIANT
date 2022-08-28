
$(document).ready(function(){
    
    $('.button-direct .btn-next').on('click' , function(){
    var parent_fieldset = $(this).parents('fieldset');
    var next_step = true;
    var next_fs = $(this).parents().next();

    if (next_step) {
        parent_fieldset.fadeOut(400,function(){
            $(this).next().fadeIn();
            $("#progress-bar li").eq($("fieldset").index(next_fs)).addClass("active");
           });
        }
    });

    $('.button-direct .previous').on('click' , function(){

 // var previous_fs = $(this).parents().prev();
    
         $(this).parents('fieldset').fadeOut(400,function() {
            $(this).prev().fadeIn();
            $("#progress-bar li").eq($("fieldset").index($(this))).removeClass("active");
        });
    });

});
