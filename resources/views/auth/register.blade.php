<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <base href="{{ asset('') }}" />

    <link href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">

<body>
    <div class="container-scroller bg-blue-auth">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h1><strong>Sign Up</strong></h1>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" id="registrationForm" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-md" id="name"
                                        placeholder="Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-md" id="email"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <select name="role" class="form-control form-control-md" id="role" required>
                                        <option disabled selected>Role</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-md"
                                        id="password" placeholder="Password" required>
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-md" id="password_confirmation"
                                        placeholder="Confirm Password" required>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-white">SIGN
                                        UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                        class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script>
    var enableSupportButton = '1'
    </script>
    <script>
    var asset_url = 'assets/'
    </script>

    <script src="{{ asset('assets/vendor/global/global.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendor/chart-js/chart.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/wnumb/wNumb.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}" type="text/javascript"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#registrationForm").validate({
            rules: {
                password_confirmation: {
                    equalTo: "#password" // Ensure the password confirmation matches the password field
                }
            },
            messages: {
                password_confirmation: {
                    equalTo: "Passwords do not match"
                }
            }
        });
    });
    </script>

    <!-- endinject -->
</body>


</html>