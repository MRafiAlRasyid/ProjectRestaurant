<!doctype html>
<html lang="en">
  <head>
  	<title>Register - Bistro Eclat</title>
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
						<div class="img" style="background-image: url(img/pexels-dmitry-zvolskiy-2253643.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
			      		</div>
			      	</div>
							<form action="{{ route('register.store') }}" method="POST" class="signin-form">
                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Name</label>
			      			<input type="text" class="form-control" placeholder="Name" name="name" required>
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Userame</label>
			      			<input type="text" class="form-control" placeholder="Username" name="username" required>
			      		</div>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" class="form-control" placeholder="Email" name="email" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		            </div>
		          </form>
		          <p class="text-center">Already have an account? <a href="{{ route('login.index') }}">Sign In</a></p>
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

