@extends('layouts.main')
@section('dashboard')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="assets/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                               @if($user->role == 'admin')
                               <h4><strong>Welcome, Admin!</strong><br> <br>You have full access to the system.</h4>
                        @elseif($user->role == 'user')
                        <h4><strong>Welcome, User!</strong><br> <br>You have limited access to the system.</h4>
                        @elseif($user->role == 'guest')
                        <h4><strong>Welcome, Guest!</strong><br> <br>You have minimal access to the system.</h4>
                        @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-left">
                                        <div class="row">
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Profile Details</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $user->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Role <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>{{ ucfirst($user->role) }}</span>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Modal -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection