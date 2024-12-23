@extends('userpage.master')
@section('body')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
    <form action="{{ route('admin.user.upload') }}" method="POST">
        @csrf
        <div class="container-xxl">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    @if (Session::has('status'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ Session::get('massage') }}

                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Add User</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">

                            <div class="mb-2">
                                <label for="role_id" class="form-label">Role</label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option selected="">Choose...</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                    {{-- <option value="3">Staff</option> --}}

                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Name</label>
                                <input class="form-control" placeholder="Enter Name" type="text" name="name" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input class="form-control" placeholder="Enter email" type="email" name="email"
                                    required>
                            </div>

                            {{-- <div class="mb-2">
                                <label>Phone</label>
                                <input class="form-control" placeholder="Enter Phone" type="text" name="phone"
                                    required>
                            </div> --}}
                            <div class="mb-3">
                                <label>Password</label>
                                <input class="form-control" placeholder="Enter password" type="password" name="password" required>

                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input class="form-control"  placeholder="Enter confirm password" type="password" name="confirm_password" required>


                            </div>

                            <input type="hidden" name="status" value="Belum">
                            <button type="submit" class="btn btn-primary">Sign Up</button>

                        </div><!--end card-body-->
                    </div>
                </div>

                <!--end col-->
            </div><!--end row-->
        </div>

    </form>
        </div></div></div>
@endsection
