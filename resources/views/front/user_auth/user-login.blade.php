@extends('front.includes.layout')
@section('page_title', 'Ecommerce App - Login')
    @section('container')
 <!-- Ec breadcrumb start -->
 <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Login</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Login</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec login page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Log In</h2>
                    <h2 class="ec-title">Log In</h2>
                    <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form id="user_login_frm" method="POST" autocomplete="off">
                            @csrf
                            <span class="ec-login-wrap">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Enter your email add..." required />
                            </span>
                            <span class="ec-login-wrap">
                                <label>Password*</label>
                                <input type="password" name="password" placeholder="Enter your password" required />
                            </span>
                            <span class="ec-login-wrap ec-login-fp">
                                <label><a href="#">Forgot Password?</a></label>
                            </span>
                            <span class="ec-login-wrap ec-login-btn">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <a href="{{url('user-register')}}" class="btn btn-secondary">Register</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection
    @section('custom_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Validations
                if (jQuery("#user_login_frm").length > 0) {
                    jQuery("#user_login_frm").validate({
                        rules: {
                            email: {
                                required: true,
                                maxlength: 50,
                                email: true,
                            },
                            password: {
                                required: true,
                            },
                        },
                        messages: {
                            email: {
                                required: "Please enter valid email",
                                email: "Please enter valid email",
                                maxlength: "The email name should less than or equal to 50 characters",
                            },
                            password: {
                                required: "Please enter Password",
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
                            url: "{{url('user-login-submit')}}",
                            type: "POST",
                            data: $('#user_login_frm').serialize(),
                            success: function(response) {
                                $('#submit').html('Submit');
                                $("#submit"). attr("disabled", false);
                                
                                if(response.status == 200){
                                    document.getElementById("user_login_frm").reset(); 
                                    swal({
                                        title: `${response.msg}`,
                                        icon: "success",
                                    }).then(function() {
                                        window.location = "{{url('/profile')}}";
                                    });
                                }else{
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