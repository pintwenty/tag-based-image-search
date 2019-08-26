$(".chosen-select").chosen();


function search() {
	// body...
	console.log($(".chosen-select").val());     
        $("#search").submit(); // Submit the form
}
$(document).on("change",".preview",function() {

   if (this.files && this.files[0]) {
    // console.log(this.files[0]);
            var reader = new FileReader();
            reader.onload = function (e) {

                $('label #image_upload_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
});

$(document).on('click','.btn.addimg',function(){
    $('.model.addimg').show();
});

$(document).on('click','.modal-close',function(){
    $('.model.'+$(this).attr('model-id')).hide();
});
// $('.chosen-search-input').keypress(function(event){
	
// 	var keycode = (event.keyCode ? event.keyCode : event.which);
// 	if(keycode == '13'){
// 		alert('You pressed a "enter" key in textbox');	
// 	}else{
// 		console.log(keycode);
// 	}

// });

$("input.chosen-search-input").on("keydown", function(e) {
    var code = e.which;
    var name = $(this).val();
    if ( code == 13 || code == 9 ) {
        e.preventDefault();
        if ($('.chosen-results>li').hasClass('no-results')) {
        	$.post("includes/addtag.php",
  				{tname: name},
			 	function(data, status){
			 		if (data=='1') {
        				$(".ics-tags").append('<option value="'+name+'" selected>'+name+'</option>').trigger("chosen:updated");
			 		}
    				// alert("Data: " + data + "\nStatus: " + status);
  				});
        }
    }
});