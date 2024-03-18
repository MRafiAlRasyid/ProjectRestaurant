<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin - Bistro Eclat</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a class="logo">
					Bistro Eclat
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"><span >{{ auth()->user()->username }}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-text">
											<h4>{{ auth()->user()->username }}</h4>
											<p class="text-muted">{{ auth()->user()->email }}</p>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<form action="{{ route('login.logout') }}" method="post">
										@csrf
										<button type="submit" class="btn btn-danger btn-lg btn-block">
											<p>Logout</p>
										</button>
									</form>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{ url('/dashboard') }}">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.user.index') }}">
								<i class="la la-dashboard"></i>
								<p>User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.menu.index') }}">
								<i class="la la-dashboard"></i>
								<p>Menu</p>
							</a>
						</li>
						<li class="nav-item">
                        <a href="{{ route('admin.chef.index') }}">
                            <i class="la la-dashboard"></i>
                            <p>Chef</p>
                        </a>
                    	</li>
						<li class="nav-item">
							<a href="{{ route('admin.tables.index') }}">
								<i class="la la-dashboard"></i>
								<p>Tables</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.booking.index') }}">
								<i class="la la-dashboard"></i>
								<p>Booking</p>
							</a>
						</li>
						<li class="nav-item update-pro">
							<a href="{{ route('home') }}" class="btn btn-primary">
								<i class="la la-rocket text-light"></i>
								<p class="text-light">Website</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Dashboard</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Pengguna</p>
													<h4 class="card-title">{{ $usersCount }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-bar-chart"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Menu</p>
													<h4 class="card-title">{{ $menusCount }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-stats card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-newspaper-o"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Chef</p>
													<h4 class="card-title">{{ $chefsCount }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="card card-stats card-primary">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-check-circle"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Table</p>
													<h4 class="card-title">{{ $tablesCount }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card card-stats card-light">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-check-circle"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Booking</p>
													<h4 class="card-title">{{ $bookingsCount }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h4>List User</h4>
									</div>
									<div class="card-body p-0">
										<table class="table table-striped text-center">
											<thead>
												<th>No</th>
												<th>Name</th>
												<th>Username</th>
												<th>Email</th>
												<th>Role</th>
											</thead>
											<tbody>
												@foreach ($users as $u)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $u->name}}</td>
													<td>{{ $u->username }}</td>
													<td>{{ $u->email }}</td>
													<td>{{ $u->role }}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
	
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header">
										<h4>List Menu</h4>
									</div>
									<div class="card-body p-0">
										<table class="table table-striped text-center">
											<thead>
												<th>No</th>
												<th>Gambar</th>
												<th>Nama Makanan</th>
												<th>Deskripsi</th>
												<th>Harga</th>
											</thead>
											<tbody>
												@foreach ($menus as $m)
												<tr>
													<td>{{ $m->id }}</td>
													<td>
														<img src="{{ asset("asset-gambar/$m->image") }}" alt="image"
														class="img-thumbnail" style="width: 100px;">
													</td>
													<td>{{ $m->nama_makanan }}</td>
													<td>{{ $m->deskripsi }}</td>
													<td>{{ $m->harga }}</td>
	
												</tr>
												@endforeach
											</tbody>
										</table>
	
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<h4>List Chef</h4>
									</div>
									<div class="card-body p-0">
										<table class="table table-striped text-center">
											<thead>
												<th>No</th>
												<th>Gambar</th>
												<th>Nama</th>
												<th>Posisi</th>
											</thead>
											<tbody>
												@foreach ($chefs as $c)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>
														<img src="{{ asset("asset-gambar/$c->gambar") }}" alt="image" class="img-thumbnail"
														style="width: 100px;">
													  </td>
													<td>{{ $c->nama }}</td>
													<td>{{ $c->posisi }}</td>
	
												</tr>
												@endforeach
											</tbody>
										</table>
	
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h4>List Table</h4>
									</div>
									<div class="card-body p-0">
										<table class="table table-striped text-center">
											<thead>
												<th>No</th>
												<th>Nama Meja</th>
											</thead>
											<tbody>
												@foreach ($tables as $t)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $t->nama_meja }}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
	
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4>List Booking</h4>
									</div>
									<div class="card-body p-0">
										<table class="table table-striped text-center">
											<thead>
												<th>No</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No Handphone</th>
												<th>Tgl Booking</th>
												<th>Nama Meja</th>
												<th>Message</th>
											</thead>
											<tbody>
												@foreach ($bookings as $b)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $b->first_name . ' ' . $b->last_name }}</td>
													<td>{{ $b->email }}</td>
													<td>{{ $b->no_hp }}</td>
													<td>{{ $b->tgl_booking }}</td>
													<td>{{ $b->table }}</td>
													<td>{{ $b->message }}</td>
	
												</tr>
												@endforeach
											</tbody>
										</table>
	
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="row">
							<div class="col-md-3">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Task</h4>
										<p class="card-category">Complete</p>
									</div>
									<div class="card-body">
										<div id="task-complete" class="chart-circle mt-4 mb-3"></div>
									</div>
									<div class="card-footer">
										<div class="legend"><i class="la la-circle text-primary"></i> Completed</div>
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">World Map</h4>
										<p class="card-category">
										Map of the distribution of users around the world</p>
									</div>
									<div class="card-body">
										<div class="mapcontainer">
											<div class="map">
												<span>Alternative content for the map</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-card-no-pd">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<p class="fw-bold mt-1">My Balance</p>
										<h4><b>$ 3,018</b></h4>
										<a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3"><i class="la la-plus"></i> Add Balance</a>
									</div>
									<div class="card-footer">
										<ul class="nav">
											<li class="nav-item"><a class="btn btn-default btn-link" href="#"><i class="la la-history"></i> History</a></li>
											<li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Refresh</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="card">
									<div class="card-body">
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Profit</span>
												<span class="text-muted fw-bold"> $3K</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="78%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Orders</span>
												<span class="text-muted fw-bold"> 576</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="65%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Tasks Complete</span>
												<span class="text-muted fw-bold"> 70%</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="70%"></div>
											</div>
										</div>
										<div class="progress-card">
											<div class="d-flex justify-content-between mb-1">
												<span class="text-muted">Open Rate</span>
												<span class="text-muted fw-bold"> 60%</span>
											</div>
											<div class="progress mb-2" style="height: 7px;">
												<div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats">
									<div class="card-body">
										<p class="fw-bold mt-1">Statistic</p>
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center icon-warning">
													<i class="la la-pie-chart text-warning"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Number</p>
													<h4 class="card-title">150GB</h4>
												</div>
											</div>
										</div>
										<hr/>
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-heart-o text-primary"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Followers</p>
													<h4 class="card-title">+45K</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Users Statistics</h4>
										<p class="card-category">
										Users statistics this month</p>
									</div>
									<div class="card-body">
										<div id="monthlyChart" class="chart chart-pie"></div>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">2018 Sales</h4>
										<p class="card-category">
										Number of products sold</p>
									</div>
									<div class="card-body">
										<div id="salesChart" class="chart"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card">
									<div class="card-header ">
										<h4 class="card-title">Table</h4>
										<p class="card-category">Users Table</p>
									</div>
									<div class="card-body">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">First</th>
													<th scope="col">Last</th>
													<th scope="col">Handle</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Mark</td>
													<td>Otto</td>
													<td>@mdo</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Jacob</td>
													<td>Thornton</td>
													<td>@fat</td>
												</tr>
												<tr>
													<td>3</td>
													<td colspan="2">Larry the Bird</td>
													<td>@twitter</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card card-tasks">
									<div class="card-header ">
										<h4 class="card-title">Tasks</h4>
										<p class="card-category">To Do List</p>
									</div>
									<div class="card-body ">
										<div class="table-full-width">
											<table class="table">
												<thead>
													<tr>
														<th>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input  select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</th>
														<th>Task</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Planning new project structure</td>
														<td class="td-actions text-right">
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link <btn-simple-primary">
																	<i class="la la-edit"></i>
																</button>
																<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-simple-danger">
																	<i class="la la-times"></i>
																</button>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Update Fonts</td>
														<td class="td-actions text-right">
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link <btn-simple-primary">
																	<i class="la la-edit"></i>
																</button>
																<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-simple-danger">
																	<i class="la la-times"></i>
																</button>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Add new Post
														</td>
														<td class="td-actions text-right">
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link <btn-simple-primary">
																	<i class="la la-edit"></i>
																</button>
																<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-simple-danger">
																	<i class="la la-times"></i>
																</button>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-check">
																<label class="form-check-label">
																	<input class="form-check-input task-select" type="checkbox">
																	<span class="form-check-sign"></span>
																</label>
															</div>
														</td>
														<td>Finalise the design proposal</td>
														<td class="td-actions text-right">
															<div class="form-button-action">
																<button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link <btn-simple-primary">
																	<i class="la la-edit"></i>
																</button>
																<button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-simple-danger">
																	<i class="la la-times"></i>
																</button>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer ">
										<div class="stats">
											<i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<div class="copyright ml-auto">
							2024, made with <i class="la la-heart heart text-danger"></i> by <a href="https://github.com/MRafiAlRasyid/MRafiAlRasyid">Muhammad Rafi Al Rasyid</a>
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
</html>