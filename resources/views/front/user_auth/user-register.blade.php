@extends('front.includes.layout')
@section('page_title', 'Ecommerce App - Register')
    @section('container')
<style>
    .invalid-feedback{
        color: red;
    }
    label{
        margin-top: 20px;
    }
</style>

     <!-- Ec breadcrumb start -->
     <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Register</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Register</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Start Register -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Register</h2>
                        <h2 class="ec-title">Register</h2>
                        <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                    </div>
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <form id="user_signup_frm" method="POST" autocomplete="off">
								@csrf
                                <span class="ec-register-wrap ec-register-half">
                                    <label>First Name*</label>
                                    <input type="text" name="first_name" class="mb-0" placeholder="Enter your first name" required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Last Name*</label>
                                    <input type="text" name="last_name" class="mb-0" placeholder="Enter your last name" required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Email*</label>
                                    <input type="email" name="email" class="mb-0" placeholder="Enter your email add..." required />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Phone Number*</label>
                                    <input type="number" name="mobile" class="mb-0" placeholder="Enter your phone number"
                                        required />
                                </span>
                                 <span class="ec-register-wrap ec-register-half">
                                    <label>Password*</label>
                                    <input type="password" name="password" id="password" class="mb-0" placeholder="Enter your password"
                                        required />
                                </span>
                                 <span class="ec-register-wrap ec-register-half">
                                    <label>Conform Password*</label>
                                    <input type="text" name="cpassword" class="mb-0" placeholder="Enter your conform password"
                                        required />
                                </span>
                                <span class="ec-register-wrap">
                                    <label>Address</label>
                                    <input type="text" name="address" class="mb-0" placeholder="Address Line 1" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>City</label>
                                    <input type="text" name="city" class="mb-0" placeholder="City" />
                                </span>
                                 <span class="ec-register-wrap ec-register-half">
                                    <label>State</label>
                                    <input type="text" name="state" class="mb-0" placeholder="State" />
                                </span>
                                
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Country*</label>
                                    <span class="ec-rg-select-inner">
                                        <select name="country" id="ec-select-country"
                                            class="ec-register-select">
                                            <option  disabled>Country</option>
                                            <option value="India" selected>India</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>PinCode</label>
                                    <input type="text" name="pincode" class="mb-0" placeholder="PinCode" />
                                </span>
                               
                                {{-- <span class="ec-register-wrap ec-recaptcha">
                                    <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                        data-callback="verifyRecaptchaCallback"
                                        data-expired-callback="expiredRecaptchaCallback"></span>
                                    <input class="form-control d-none" data-recaptcha="true" required
                                        data-error="Please complete the Captcha">
                                    <span class="help-block with-errors"></span>
                                </span> --}}
                                <span class="ec-register-wrap ec-register-btn">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->

    @endsection
@section('custom_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        // Validations
			if (jQuery("#user_signup_frm").length > 0) {
				jQuery("#user_signup_frm").validate({
					rules: {
						first_name: {
							required: true,
							maxlength: 50
						},
                        last_name: {
							required: true,
							maxlength: 50
						},
                        email: {
							required: true,
							maxlength: 50,
							email: true,
						},
                        mobile: {
							required: true,
							number: true,
							minlength: 10,
							maxlength: 10,
						},
                        password: {
							required: true,
						},
						cpassword: {
							required: true,
							equalTo: "#password",
						},
                        address: {
							required: true,
						},  
						city: {
							required: true,
						},
						state: {
							required: true,
						},
                        country: {
							required: true,
						},
						pincode: {
							required: true,
							number: true,
							minlength: 6,
							maxlength: 6,
						},
                        
					},
					messages: {
                        first_name: {
							required: "Please enter first name",
							maxlength: "Your name maxlength should be 50 characters long."
						},
                        last_name: {
							required: "Please enter last name",
							maxlength: "Your name maxlength should be 50 characters long."
						},
                        email: {
							required: "Please enter valid email",
							email: "Please enter valid email",
							maxlength: "The email name should less than or equal to 50 characters",
						},
						mobile: {
							required: 'Please enter mobile number',
							number: 'Please enter only digits',
							minlength: "Please enter 10 digits mobile number",
							maxlength: "Please enter valid mobile",
						},
                        password: {
							required: "Please enter Password",
						},
						cpassword: {
							required : 'Confirm Password is required',
			   				equalTo : 'Password not matching',
						},
                        address: {
							required: "Please enter address",
						},
                        city: {
							required: "Please enter city",
						},
                        state: {
							required: "Please enter state name",
						},
                        country: {
							required: "Please enter select country",
						},
						pincode: {
							required: "Please enter pincode",
							number: 'Please enter only digits',
							minlength: "Please enter 6 digits pincode number",
							maxlength: "Please enter valid pincode",
						},
					},
					errorElement: "div",
					errorPlacement: function(error, element) {
						error.addClass("invalid-feedback");
						error.insertAfter(element);
					},
	
					submitHandler: function(form) {
						jQuery.ajaxSetup({
							headers: {
							'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
						}
					});
					jQuery('#submit').html('Please Wait...');
					jQuery("#submit"). attr("disabled", true);
					jQuery.ajax({
						url: "{{url('user-signup-submit')}}",
						type: "POST",
						data: $('#user_signup_frm').serialize(),
						success: function(response) {
							$('#submit').html('Submit');
							$("#submit"). attr("disabled", false);
							
                            if(response.status == 201){
                                document.getElementById("user_signup_frm").reset(); 
                                swal({
                                    title: `${response.msg}`,
                                    icon: "success",
                                }).then(function() {
									window.location = "{{url('/login')}}";
								});
                            }else{
                                // document.getElementById("user_signup_frm").reset(); 
                                swal({
                                    title: `${response.msg}`,
                                    icon: "error",
                                });
                            }
                            
                           

						}
					});
				 }
				})
			 }
	
    });
</script>
@endsection