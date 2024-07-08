<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
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
                            <h1>Reset Your Password</h1>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}" class="pt-3">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-md" placeholder="Email" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-md" placeholder="New Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control form-control-md" placeholder="Confirm New Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Reset Password</button>
                                </div>
                            </form>
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