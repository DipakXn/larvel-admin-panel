<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <base href="{{ asset('') }}" />

    <link href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
</head>
<body>
<div class="container-scroller bg-blue-auth">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                                <h1>Forgot Password</h1>
                            </div>
                            <h6 class="font-weight-light"><span style="color:red;">*</span>Please provide your email address to reset your password. </h6>
                           
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible alert-alt fade show">
									{{ session('status') }}
								</div>
                            @endif
                            @if ($errors->any())                                
                                <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-md" placeholder="Email" required value="{{ old('email') }}">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Send Password Reset Link</button>
                                </div>
                            </form>
                            <div class="note">
                                <hr>
                                <h5><strong>Note:</strong></h5>
                            <h6 class="font-weight-light">You will receive a reset link at your email address.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
  <!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script> var enableSupportButton = '1'</script>
	<script> var asset_url = 'assets/'</script>

	<script src="{{ asset('assets/vendor/global/global.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/chart-js/chart.bundle.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendor/wnumb/wNumb.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/dlabnav-init.js') }}" type="text/javascript"></script>
</body>


</html>