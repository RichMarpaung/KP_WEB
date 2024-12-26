@extends('userpage.master')
@section('body')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <form action="{{ route('admin.place.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Add Place</h4>
                                    </div><!--end col-->
                                </div>  <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="name" placeholder="Enter Name" name="name" required>
                                </div>

                                <div class="mb-2">
                                    <label for="address" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="address" placeholder="Enter address" name="address" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="latitude" class="form-label">Latitude</label>
                                    <input class="form-control" type="text" id="latitude" placeholder="Enter latitude" name="latitude" required>
                                 </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="longitude" class="form-label">Longitude</label>
                                    <input class="form-control" type="text" id="longitude" placeholder="Enter longitude" name="longitude " required>
                                 </div>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label">Image</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                                        <label class="input-group-text" for="photo">Upload</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit form</button>
                            </div><!--end card-body-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </form>

        <!--end col-->
    </div><!--end row-->
</div>

</form></div></div>
@endsection
