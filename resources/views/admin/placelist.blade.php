@extends('userpage.master')
@section('body')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
<div class="container-xxl">

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Customers Details</h4>
                        </div><!--end col-->
                    </div>  <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table datatable" id="datatable_1">
                            <thead class="table-light">
                              <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>alamat</th>
                                <th>Description</th>
                                <th>Rating</th>
                                @if (Auth::user()->role->name === 'admin')
                                <th>Action</th>
                                @endif
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($places as $item)
                                <tr>
                                 <td>@if ($item->pic)
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="Tidak Ada " style="max-width: 100px; max-height: 100px;">

                                @else
                                <h6>Tidak Ada Sampul</h6>
                                @endif</td>
                                </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    {{-- <td>{{ $item->latitude }}</td>
                                    <td>{{ $item->longitude }}</td> --}}
                                    <td>{{ $item->description }}</td>
                                    <td>⭐{{ number_format($item->reviews_avg_rating, 1) }}</td>

                                    @if (Auth::user()->role->name === 'admin')
                                    <td class="text-end">

                                        <a href="#"><i class="las la-pen text-secondary font-16 text-info"></i></a>
                                        <form action="{{ route('admin.place.delete', $item->id) }}" method="POST" class="d-inline m-2">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn p-0 border-0 bg-transparent">
                                                <i class="las la-trash-alt text-secondary font-16 text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
</div></div></div>


</div><!-- container -->
@endsection