f<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - Ace Admin</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

	<!-- text fonts -->
	<link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css')}}" />

	<!-- ace styles -->
	<link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />
</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<i class="ace-icon fa fa-leaf green"></i>
								<span class="red">Ace</span>
								<span class="white" id="id-text2">Application</span>
							</h1>
							<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
						</div>

						<div class="space-6"></div>

						<div id="signup-box" class="signup-box widget-box no-border visible">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header green lighter bigger">
										<i class="ace-icon fa fa-users blue"></i>
										New User Registration
									</h4>

									<div class="space-6"></div>
									<p> Enter your details to begin: </p>

									<form action="{{route('admin.auth.register')}}" method="post">
										{{ csrf_field() }}
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" name="email" class="form-control" placeholder="Email">
													<i class="ace-icon fa fa-envelope"></i>
												</span>
											</label>
											@if ($errors->has('email'))
											<p style="color: red;">{{ $errors->first('email')}}</p>
											@endif
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" name="name" class="form-control" placeholder="Name">
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>
											@if ($errors->has('name'))
											<p style="color: red;">{{ $errors->first('name')}}</p>
											@endif
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" name="password" class="form-control" placeholder="Password">
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>
											@if ($errors->has('password'))
											<p style="color: red;">{{ $errors->first('password')}}</p>
											@endif
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password">
													<i class="ace-icon fa fa-retweet"></i>
												</span>
											</label>
											@if ($errors->has('password_confirmation'))
											<p style="color: red;">{{ $errors->first('password_confirmation')}}</p>
											@endif
											<label class="block">
												<input type="checkbox" class="ace">
												<span class="lbl">
													I accept the
													<a href="#">User Agreement</a>
												</span>
											</label>

											<div class="space-24"></div>

											<div class="clearfix">
												<button type="reset" class="width-30 pull-left btn btn-sm">
													<i class="ace-icon fa fa-refresh"></i>
													<span class="bigger-110">Reset</span>
												</button>

												<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
													<span class="bigger-110">Register</span>

													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</fieldset>
									</form>
								</div>

								<div class="toolbar center">
									<a href="{{route('login')}}" class="back-to-login-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back to login
									</a>
								</div>
							</div><!-- /.widget-body -->
						</div>

						<div class="navbar-fixed-top align-right">
							<br />
							&nbsp;
							<a id="btn-login-dark" href="#">Dark</a>
							&nbsp;
							<span class="blue">/</span>
							&nbsp;
							<a id="btn-login-blur" href="#">Blur</a>
							&nbsp;
							<span class="blue">/</span>
							&nbsp;
							<a id="btn-login-light" href="#">Light</a>
							&nbsp; &nbsp; &nbsp;
						</div>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>

	<!-- <![endif]-->

		<!--[if IE]>
<script src="js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='{{asset('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$(document).on('click', '.toolbar a[data-target]', function(e) {
			e.preventDefault();
			var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			});
	});



			//you don't need this, just used for changing background
			jQuery(function($) {
				$('#btn-login-dark').on('click', function(e) {
					$('body').attr('class', 'login-layout');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-light').on('click', function(e) {
					$('body').attr('class', 'login-layout light-login');
					$('#id-text2').attr('class', 'grey');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-blur').on('click', function(e) {
					$('body').attr('class', 'login-layout blur-login');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'light-blue');

					e.preventDefault();
				});

			});
		</script>
	</body>
	</html>
