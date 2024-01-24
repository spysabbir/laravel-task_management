<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('asset') }}/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('asset') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('asset') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset('asset') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="{{ asset('asset') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<!-- loader-->
	<link href="{{ asset('asset') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('asset') }}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('asset') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('asset') }}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('asset') }}/css/app.css" rel="stylesheet">
	<link href="{{ asset('asset') }}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('asset') }}/css/dark-theme.css" />
	<link rel="stylesheet" href="{{ asset('asset') }}/css/semi-dark.css" />
	<link rel="stylesheet" href="{{ asset('asset') }}/css/header-colors.css" />

    <link href="{{ asset('asset') }}/plugins/toastr/toastr.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">

	<title>{{ config('app.name', 'Laravel') }} –  @yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('asset') }}/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">{{ config('app.name', 'Laravel') }}</h4>
				</div>
				<div class="toggle-icon ms-auto">
                    <i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			@include('layouts.navigation')
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->

		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu">
                        <i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								{{-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a> --}}
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								{{-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a> --}}
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="{{ asset('asset') }}/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('asset') }}/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">{{ Auth::user()->email }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class='bx bx-log-out-circle'></i><span>Logout</span>
                                    </a>
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
		        <!--start content -->
				@yield('content')
		        <!--end content -->
			</div>
		</div>
		<!--end page wrapper -->

		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ date('Y') }}. All right reserved.</p>
		</footer>

	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('asset') }}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ asset('asset') }}/js/jquery.min.js"></script>
	<script src="{{ asset('asset') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('asset') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('asset') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="{{ asset('asset') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/toastr/toastr.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<!--app JS-->
	<script src="{{ asset('asset') }}/js/app.js"></script>

    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        });
    </script>
	<!--custom JS-->
    @yield('script')

</body>

</html>
