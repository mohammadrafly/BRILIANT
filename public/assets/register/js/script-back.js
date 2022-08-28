$(document).ready(function(){

	$('.toggle').click(function(e){
		e.preventDefault();
		$(this).next('ul').slideToggle();
	});

	$('.toggle-nav').click(function(){
        $('#side-nav-box').toggleClass('active');
        $('#content-wrapper').toggleClass('push');
	});

    $("#gear-list").hover(
        function(){
            $("#gear").addClass('fa-spin');
        },
        function(){
            $("#gear").removeClass('fa-spin');
        }
    );

// function readURL(input)
//     {
//     	if(input.files && input.files[0])
//     	{
//     		var reader = new FileReader();
//     		reader.onload = function(e)
//     		{
//     			$('#preview-img').css({'display':'block'});
//     			$('#img-live').attr('src', e.target.result);
//     		}
//             reader.readAsDataURL(input.files[0]);
//     	}
//     }
//     $('#foto').change(function(){
//     	readURL(this);
//     });
// });