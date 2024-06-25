@extends('layouts.main')
@section('dashboard')
<style>
    .card table {
    border: none;
    font-size: 16px;
    height: 170px;
    width: 80%;
}
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Profile Details</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if($user->role == 'admin')
                        <p>Welcome, Admin! You have full access to the system.</p>
                        @elseif($user->role == 'user')
                        <p>Welcome, User! You have limited access to the system.</p>
                        @elseif($user->role == 'guest')
                        <p>Welcome, Guest! You have minimal access to the system.</p>
                        @endif


                        <table>
                    <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Role</strong></td>
                            <td>:</td>
                            <td>{{ ucfirst($user->role) }}</td>
                        </tr>
                        
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection