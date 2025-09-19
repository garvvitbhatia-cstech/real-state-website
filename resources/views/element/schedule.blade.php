<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--Schedule Section start here-->
<div class="schedule-section">
  <span id="show" class="schedule-text pointer">Schedule a Visit</span>
</div>
<!--Schedule  Section end here-->

<div class="schedule-section-box" style="display: none;">
  <div class="popup-title">
    <h3>Schedule Your Tour</h3>
    <span class="pointer close-icon" id="hide"><img src="{{ asset('public/img/home/modal-close.png') }}"></span>
  </div>
  <div class="get-in-touch-card p-4">
    <form class="d-flex align-items-center flex-column" id="schedule_form">
        <div class="row">
            <div class="col-md-12 mb-4">
            <input placeholder="Name" name="schedule_name" id="schedule_name" type="text" class="flex-1">
          </div>
          <div class="col-md-12 mb-4">
            <input placeholder="Email ID " class="flex-1" name="schedule_email" id="schedule_email" type="text">
          </div>
          <div class="col-md-12 mb-4">  
            <label class="w-full flex-1" for="">
              <div class="form__input border-b-red-500  PhoneInput">
                <div class="PhoneInputCountry">
                  <select name="phoneCountry" aria-label="Phone number country" class="PhoneInputCountrySelect">
                    <option value="IN">India</option>
                  </select>
                  <div aria-hidden="true" class="PhoneInputCountryIcon PhoneInputCountryIcon--border">
                    <img class="PhoneInputCountryIconImg" alt="India" src="https://purecatamphetamine.github.io/country-flag-icons/3x2/IN.svg">
                  </div>
                  <div class="PhoneInputCountrySelectArrow"></div>
                </div>
                <input type="tel" autocomplete="tel" placeholder="Mobile number" name="schedule_contact" id="schedule_contact" class="numberonly phone-number-input ms-5 false numberonly" maxlength="10">
              </div>
            </label>
          </div>              
        </div>
        <div class="row w-100">
            <div class="col-md-6 mb-4">
              <input placeholder="{{ date('Y-m-d') }}" name="schedule_date" id="schedule_date" min="{{ date('Y-m-d') }}" type="date" class="flex-1">
            </div>
            <div class="col-md-6 mb-4">
              <select name="schedule_time" id="schedule_time" aria-label="Phone number country" class="time-select">
                  <option value="10:00 AM">10:00 AM</option>
                  <option value="10:15 AM">10:15 AM</option>
                  <option value="10:30 AM">10:30 AM</option>
                  <option value="10:45 AM">10:45 AM</option>
                  <option value="11:00 AM">11:00 AM</option>
                  <option value="11:15 AM">11:15 AM</option>
                  <option value="11:30 AM">11:30 AM</option>
                  <option value="11:45 AM">11:45 AM</option>
                  <option value="12:00 PM">12:00 PM</option>
                  <option value="12:15 PM">12:15 PM</option>
                  <option value="12:30 PM">12:30 PM</option>
                  <option value="12:45 PM">12:45 PM</option>
                  <option value="01:00 PM">01:00 PM</option>
                  <option value="01:15 PM">01:15 PM</option>
                  <option value="01:30 PM">01:30 PM</option>
                  <option value="01:45 PM">01:45 PM</option>
                  <option value="02:00 PM">02:00 PM</option>
              </select>
            </div>
        </div>
		<div class="row w-100">
            
            <div class="col-md-12 mb-4">
				<div class="g-recaptcha" data-callback="enableSubmitBtn" data-sitekey="6LfRW9IqAAAAAEb5ld8SKXLbyCN6p0Gj8iPdM6D7"></div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <label for="subscribe" class="checkbox-default d-flex pb-4">
              <input type="checkbox" class="" name="status" checked="">
              <span class="leading-8">Yes, I would like to receive updates & promotions from Navkar City.</span> 
            </label>
          </div>
   		</div>
      	<button class="btn-black" id="schedule_btn" disabled="disabled" type="button">SUBMIT</button>
    </form>
  </div>
</div>

<script type="text/javascript">
	function enableSubmitBtn(){
		document.getElementById("schedule_btn").disabled = false;
	}
	$(document).ready(function(){
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9]/g))
			return false;
		});
    });
	$(document).on('click','#schedule_btn',function(){
		var temp = 1;
		if($('#schedule_name').val() == ''){
			swal("Error",'Please enter name.','error');	
			temp = 0;			
			return false;
		}		
		if($('#schedule_email').val() == ''){
			swal("Error",'Please enter email.','error');
			temp = 0;
			return false;
		}else{
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test($.trim($('#schedule_email').val()))){
				swal("Error","Please enter valid email", "error");
				temp = 0;
				return false;
			}
		}
		if($('#schedule_contact').val() == ''){
			swal("Error",'Please enter phone number.','error');
			temp = 0;
			return false;
		}else if($('#schedule_contact').val().length != 10){
			swal("Error",'Please enter valid phone number.','error');
			temp = 0;
			return false;
		}
		if($('#schedule_date').val() == ''){
			swal("Error",'Please enter date.','error');	
			temp = 0;			
			return false;
		}
		if($('#schedule_time').val() == ''){
			swal("Error",'Please enter time.','error');	
			temp = 0;			
			return false;
		}		
		if(temp == 1){			
			$('#schedule_btn').html('Processing...');
			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/save-schedule')}}",
				data: $('#schedule_form').serialize(),
				success: function(response){
					if(response == 'Success'){
						$('#schedule_name').val('');
						$('#schedule_email').val('');
						$('#schedule_contact').val('');
						$('#schedule_date').val('');
						$('#schedule_btn').html('Submit');
						swal("Success",'Schedule send successfully.','success');
					}else{
						swal("Error",'Please enter valid captcha.','error');
						$('#schedule_btn').html('Submit');
					}
				},error: function(ts) {
					swal("Error",'Something went wrong, please try after sometime.','error');	
					$('#schedule_btn').html('Submit');			
					return false;
				}
			});
			return false;
		}
	});
</script>