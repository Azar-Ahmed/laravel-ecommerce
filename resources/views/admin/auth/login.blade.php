<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Admin Dashboard">

		<title>Ecommerce - Admin Dashboard</title>
		
		<!-- GOOGLE FONTS -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

		<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
		
		<!-- Ekka CSS -->
		<link id="ekka-css" rel="stylesheet" href="{{asset('admin_assets/css/ekka.css')}}" />
		
		<!-- FAVICON -->
		<link href="{{asset('admin_assets/img/favicon.png')}}" rel="shortcut icon" />
	</head>
	
	<body class="sign-inup" id="body">
		<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								<a href="{{url('/')}}" title="Ekka">
									<img class="ec-brand-icon" src="{{asset('admin_assets/img/logo/logo-login.png')}}" alt="" />
								</a>
							</div>
						</div>
						<div class="card-body p-5">
							<h4 class="text-dark mb-5">Sign In</h4>
							<div class="text-center my-4">
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show login_msg" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @elseif(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show login_msg" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
							<form action="{{url('login-submit')}}" method="post">
                                @csrf
								<div class="row">
									<div class="form-group col-md-12 mb-4">
										<input type="email" name="email" class="form-control" id="email" placeholder="Email ID">
									</div>
									
									<div class="form-group col-md-12 ">
										<input type="password" name="password" class="form-control" id="password" placeholder="Password">
									</div>
									
									<div class="col-md-12">
										<div class="d-flex my-2 justify-content-between">
											<div class="d-inline-block mr-3">
												{{-- <div class="control control-checkbox">Remember me
													<input type="checkbox" />
													<div class="control-indicator"></div>
												</div> --}}
											</div>
											
											<p><a class="text-blue" href="#">Forgot Password?</a></p>
										</div>
										
										<button type="submit" class="btn btn-primary btn-block my-3">Sign In</button>
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		<script src="{{asset('admin_assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('admin_assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('admin_assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
		<script src="{{asset('admin_assets/plugins/slick/slick.min.js')}}"></script>
	
		<!-- Ekka Custom -->	
		<script src="{{asset('admin_assets/js/ekka.js')}}"></script>

        <script>
            $(document).ready(function () {
                setTimeout(function() {
                    $('.login_msg').fadeOut('fast');
                }, 3000);
            });
        </script>
	</body>
</html>