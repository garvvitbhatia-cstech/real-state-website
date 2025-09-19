    $(document).ready(function(){
    var formSubmitted = false;
	$('#form_submit').click(function(e){
		var flag = 0;
        if(!formSubmitted){
            formSubmitted = false;
            if($.trim($("#country").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Select Country.', "error");
                return false;
            }
			if($.trim($("#state").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Select State.', "error");
                return false;
            }
			if($.trim($("#city").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Select City.', "error");
                return false;
            }
			if($.trim($("#contact").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Enter contact.', "error");
                return false;
            }
			if($.trim($("#from").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Enter From Time.', "error");
                return false;
            }
			if($.trim($("#to").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Enter To Time.', "error");
                return false;
            }
			if($.trim($("#address").val()) == ''){
                flag = 1;
                swal("Error!", 'Please Enter Address.', "error");
                return false;
            }
            if(flag == 0){
                $('#form_submit .indicator-label').addClass('d-none');
                $('#form_submit .indicator-progress').removeClass('d-none');
                var form = $('#pageForm')[0];
                var formData = new FormData(form);
                formSubmitted = true;
                $.ajax({
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: saveDataURL,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(msg){
                        var obj = JSON.parse(msg);
                        formSubmitted = false;
                        $('#form_submit .indicator-label').removeClass('d-none');
                        $('#form_submit .indicator-progress').addClass('d-none');
                        if(obj['heading'] == "Success"){
                            swal("", obj['msg'], "success").then((value) => {
                                window.location.assign(returnURL);
                            });
                        }else{
                            swal("Error!", obj['msg'], "error");
                            return false;
                        }
                    },error: function(ts) {
                        formSubmitted = false;
                        $('#form_submit .indicator-label').removeClass('d-none');
                        $('#form_submit .indicator-progress').addClass('d-none');
                        swal("Error!", 'Some thing want to wrong, please try after sometime.', "error");
                        return false;
                    }
                });
            }
        }
	});
});
