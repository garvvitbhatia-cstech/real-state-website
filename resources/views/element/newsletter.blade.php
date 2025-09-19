<!--Get in touch section start here-->
<div id="get-in-touch" class="get-in-touch-section pt-20 pb-4 wow fadeInUp">
  <div class="container">
      <!--<div class="section-title tex-center wow fadeInUp">
        <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
        <h2 class="text-uppercase">You may also like</h2>
        <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
      </div>-->
      <!--<div class="col-md-8 mt-5 mx-auto">
        <p class="lead text-center">If you would like to know more details or something specific, feel free to contact us. Our site representative will give you a call back.</p>
      </div>-->

      <div class="get-in-touch-card mt-5 p-4">
        <form class="d-flex align-items-center" id="newsletter_form">
          <div class="d-flex flex-column">
            <div class="d-flex flex-column align-items-center gap-5 flex-md-row">
              <input placeholder="Name" name="newsletter_name" type="text" id="newsletter_name" class="flex-1" value="">
              <label class="w-full flex-1" for="">
                <div class="form__input border-b-red-500  PhoneInput">
                  <div class="PhoneInputCountry">
                    <select name="country" id="country" aria-label="Phone number country" class="PhoneInputCountrySelect">
                      <option value="IN">India</option>
                    </select>
                    <div aria-hidden="true" class="PhoneInputCountryIcon PhoneInputCountryIcon--border">
                      <img class="PhoneInputCountryIconImg" alt="India" src="https://purecatamphetamine.github.io/country-flag-icons/3x2/IN.svg">
                    </div>
                    <div class="PhoneInputCountrySelectArrow"></div>
                  </div>
                  <input type="tel" autocomplete="tel" placeholder="Mobile number" id="newsletter_phone" name="newsletter_phone" class="phone-number-input ms-5 false numberonly" maxlength="10" value="">
                </div>
              </label>
              <input placeholder="Email ID " class="flex-1" name="newsletter_email" type="text" id="newsletter_email" value="">              
            </div>		
            	
            <label for="subscribe" class="checkbox-default d-flex align-items-center py-4">
              <input type="checkbox" class="" name="status" checked="true" value="1">
              <span class="leading-8">Yes, I would like to receive updates &amp; promotions from Navkar City.</span>
            </label>
			
			<div class="row w-100">
            
            <div class="col-md-12 mb-4">
				<div class="g-recaptcha" data-callback="enableSubmitNewsBtn" data-sitekey="6LfRW9IqAAAAAEb5ld8SKXLbyCN6p0Gj8iPdM6D7"></div>
            </div>
        </div>

          </div>          
          <button id="send_newsletter" disabled="disabled" class="btn-black" type="button">send</button>
        </form>
      </div>
  </div>
</div>
<!--Get in touch section end here-->


<script type="text/javascript">
	function enableSubmitNewsBtn(){
		document.getElementById("send_newsletter").disabled = false;
	}
	$(".btn-refresh").click(function() {
		$(".captcha_div span").html('Processing...');
		$.ajax({
		  type: 'GET',
		  url: "{{url('/refresh_captcha')}}",
		  success: function(data) {
			$(".captcha_div span").html(data.captcha);
		  }
		});
		return false;
	  });
	  
	$(document).ready(function(){
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9]/g))
			return false;
		});
    });
	$(document).on('click','#send_newsletter',function(){
		var temp = 1;
		if($('#newsletter_name').val() == ''){
			swal("Error",'Please enter name.','error');	
			temp = 0;			
			return false;
		}
		if($('#newsletter_phone').val() == ''){
			swal("Error",'Please enter phone number.','error');
			temp = 0;
			return false;
		}else if($('#newsletter_phone').val().length != 10){
			swal("Error",'Please enter valid phone number.','error');
			temp = 0;
			return false;
		}
		if($('#newsletter_email').val() == ''){
			swal("Error",'Please enter email.','error');
			temp = 0;
			return false;
		}else{
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test($.trim($('#newsletter_email').val()))){
				swal("Error","Please enter valid email", "error");
				temp = 0;
				return false;
			}
		}
		if(temp == 1){			
			$('#send_newsletter').html('Processing...');
			$.ajax({
				type: 'POST',
				dataType:'JSON',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/save-newsletter')}}",
				data: $('#newsletter_form').serialize(),
				success: function(response){					
					if(response.heading == "Success"){
						swal("", response.msg, "success").then((value) => {
							$('#newsletter_phone').val('');
							$('#newsletter_name').val('');
							$('#newsletter_email').val('');
							$('#captcha').val('');							
							$('#send_newsletter').html('send');
						});
					}else{
						swal("Error!", response.msg, "error");
						$('#send_newsletter').html('send');
						return false;
					}					
				},error: function(ts) {
					swal("Error",'Something went wrong, please try after sometime.','error');				
					return false;
				}
			});
			return false;
		}
	});
</script>