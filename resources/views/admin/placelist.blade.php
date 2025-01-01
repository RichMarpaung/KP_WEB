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
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Place List</h4>
                        <button type="button" class="btn btn-primary ms-auto">Add Place</button>
                    </div>
                </div>

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
                                 <td>@if ($item->photo)
                                    <img src="{{ asset('storage/'.$item->photo) }}" alt="Tidak Ada " style="max-width: 100px; max-height: 100px;">

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


                                    <td class="text-end">
                                        <div class="d-flex justify-content-end align-items-center gap-2">
                                            <a href="#" class="btn p-0 border-0 bg-transparent">
                                                <i class="las la-pen text-secondary font-16 text-info"></i>
                                            </a>
                                            <form action="{{ route('admin.place.delete', $item->id) }}" method="POST" id="deleteForm{{ $item->id }}" class="d-inline m-2">
                                                @csrf
                                                @method('DELETE')  <!-- Mengubah POST menjadi DELETE -->
                                                <button type="button" class="btn p-0 border-0 bg-transparent" onclick="confirmDelete({{ $item->id }})">
                                                    <i class="las la-trash-alt text-secondary font-16 text-danger"></i>
                                                </button>
                                            </form>


                                        </div>
                                    </td>

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
@if(session('success'))
    <script>
        window.onload = function() {
            Swal.fire({
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
        }
    </script>
@endif
<script>
function confirmDelete(id) {
    console.log(id);  // Untuk memeriksa apakah ID sudah benar
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat mengembalikan data ini setelah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika konfirmasi diambil, kirim form penghapusan
            document.getElementById('deleteForm' + id).submit();
        }
    });
}
</script>

@endsection
