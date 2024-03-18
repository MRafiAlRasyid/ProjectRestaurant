<!doctype html>
<html lang="en">

<head>
	<title>Login - Bistro Eclat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="cssLogin/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex">
					<div class="img" style="background-image: url(img/pexels-rene-asmussen-1581384.jpg);">
					</div>
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4">Sign In</h3>
								@if (Session::has('success'))
								<div class="alert alert-primary">
									<b>{{ Session::get('success') }}</b>
								</div>
								@endif
								@if (Session::has('error'))
								<div class="alert alert-primary">
									<b>{{ Session::get('error') }}</b>
								</div>	
								@endif
							</div>
						</div>
						<form action="{{ route('login.authenticate') }}" method="POST" class="signin-form">
							@csrf
							<div class="form-group mb-3">
								<label class="label" for="name">Email</label>
								<input type="email" class="form-control" placeholder="Email" name="email" required>
							</div>
							<div class="form-group mb-3">
								<label class="label" for="password">Password</label>
								<input type="password" class="form-control" placeholder="Password" name="password"
									required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
									In</button>
							</div>
						</form>
						<p class="text-center">Dont have an account? <a href="{{ route('register.index') }}">Sign Up</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<script src="jsLogin/jquery.min.js"></script>
	<script src="jsLogin/popper.js"></script>
	<script src="jsLogin/bootstrap.min.js"></script>
	<script src="jsLogin/main.js"></script>

</body>

</html>