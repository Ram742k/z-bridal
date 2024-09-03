


<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>z-Bridal</title>

		<!-- Meta -->
		<meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="assets/images/favicon.svg" />

		<!-- *************
			************ CSS Files *************
		************* -->
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css" />
		<link rel="stylesheet" href="assets/css/main.min.css" />
	</head>

	<body class="bg-white">
		<!-- Container start -->
		<div class="container">
			<div class="row justify-content-center align-items-center min-vh-100">
				<div class="col-xl-4 col-lg-5 col-sm-6 col-12" >
                <form method="POST" action="{{ route('login') }}">
                @csrf
						<div class="border rounded-2 p-4 mt-5">
							<div class="login-form">
								<a href="index.html" class="mb-4 d-flex">
									<img src="assets/images/logo.svg" class="img-fluid login-logo" alt="Earth Admin Dashboard" />
								</a>
								<h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
								<div class="mb-3">
									<label class="form-label">Your Email</label>
									<input type="text" class="form-control" name="email" placeholder="Enter your email" />
								</div>
								<div class="mb-3">
									<label class="form-label">Your Password</label>
									<input type="password" class="form-control" name="password" placeholder="Enter password" />
								</div>
								<div class="d-grid py-3 mt-4">
									<button type="submit" class="btn btn-lg btn-primary">
										Login
									</button>
								</div>
							
							</div>
						</div>
					</form>
                    @if($errors->any())
        <div>{{ $errors->first('error') }}</div>
    @endif
				</div>
			</div>
		</div>
		<!-- Container end -->
	</body>

</html>