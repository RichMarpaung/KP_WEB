@extends('userpage.master')
@section('body')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
<div class="container-xxl">
<form action="{{ route('admin.user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Edit User</h4>
                            </div><!--end col-->
                            <div class="col text-end">
                                <!-- Cancel Button -->
                                <a href="{{ url()->previous() }}" class="m-2">
                                    <i class="las la-times text-secondary font-16"></i>
                                </a>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-header-->

                    <div class="card-body pt-0">
                        <div class="mb-2">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control" type="text" id="name"
                                   placeholder="Enter Name" name="name"
                                   value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" id="email"
                                   placeholder="Enter Email" name="email"
                                   value="{{ old('email', $user->email) }}">
                        </div>
                        {{-- <div class="mb-2">
                            <label for="password" class="form-label">password</label>
                            <input class="form-control" type="text" id="password"
                                   placeholder="Enter password" name="password"
                                   value="{{ old('password', $user->password) }}">
                        </div> --}}




                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
</form></div></div></div>
@endsection
