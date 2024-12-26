@extends('userpage.master')
@section('body')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">
                <h1>{{ $place->name }}</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ $place->photo }}" alt="" class="img-fluid" style=" height: 400px; object-fit: cover;">

                                <div class="post-title mt-3">


                                    {{-- <h5 href="#" class="fs-20 fw-bold d-block my-3">There is nothing more beautiful than nature.</h5> --}}
                                    <h4 class="fs-15 mt-3">{{ $place->description }}

                                    </h4>
                                    <p>Alamat : {{ $place->address }}</p>
                                    <p class="card-text">
                                        Rating:
                                        @php
                                            $avgRating = floor($place->reviews_avg_rating); // Bulatkan rata-rata rating
                                        @endphp
                                        @for ($i = 1; $i <= $avgRating; $i++)
                                            ⭐
                                        @endfor
                                        @for ($i = $avgRating + 1; $i <= 5; $i++)
                                            ☆
                                        @endfor
                                        ({{ number_format($place->reviews_avg_rating, 1) }}) <!-- Tampilkan rata-rata rating -->
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-dark fw-semibold mb-0">Comments (3)</p>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                            <div class="card-body border-bottom-dashed">
                                <ul class="list-unstyled mb-0">

                                    @foreach ($reviews as $item)
                                    <li class="mt-3">
                                        <div class="row">
                                            <div class="col-auto">
                                                {{-- <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle"> --}}
                                                <i class="far fa-user me-1 thumb-md rounded-circle"></i>
                                            </div><!--end col-->
                                            <div class="col">
                                                <div class="bg-light rounded ms-n2 bg-light-alt p-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-dark fw-semibold mb-2">{{ $item->user->name }}</p>
                                                        </div><!--end col-->
                                                        <div class="col-auto">
                                                            <span class="text-muted"><i class="far fa-clock me-1"></i>-</span>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                    {{-- <img src="{{ asset('storage/' . $item->pic) }}"  style="width: 200px; height: 200px; object-fit: cover;"> --}}
                                                    @if($item->pic && file_exists(public_path('storage/' . $item->pic)))
    <img src="{{ asset('storage/' . $item->pic) }}" style="width: 200px; height: 200px; object-fit: cover;">
@endif
                                                    <h6 class="mt-2">{{ $item->coment }}</h6>
                                                    <p class="card-text">
                                                        Rating:
                                                        @for ($i = 1; $i <= $item->rating; $i++)
                                                            ⭐
                                                        @endfor
                                                        @for ($i = $item->rating + 1; $i <= 5; $i++)
                                                            ☆
                                                        @endfor
                                                        ({{ $item->rating }})
                                                    </p>

                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </li>
                                    @endforeach


                                </ul>
                            </div><!--end card-body-->
                            {{-- <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-dark fw-semibold mb-0">Leave a comment</p>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body--> --}}
                            <div class="card-body pt-0">
                                {{-- <form method="POST" action="{{ route('store.coment') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden">
                                    <div class="form-group mb-3">
                                        <textarea name="coment" class="form-control" rows="5" id="leave_comment" placeholder="Message"></textarea>
                                    </div>
                                    <p class="text-dark fw-semibold mb-2">Foto</p>
                                    <div class="input-group mb-3">
                                        <input name="pic" type="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <p>Rating : </p>
                                    <div class="starability-basic">
                                        <input type="radio" id="rate1" name="rating" value="1">
                                        <label for="rate1" title="Amazing">1 stars</label>

                                        <input type="radio" id="rate2" name="rating" value="2">
                                        <label for="rate2" title="Very good">2 stars</label>

                                        <input type="radio" id="rate3" name="rating" value="3">
                                        <label for="rate3" title="Average">3 stars</label>

                                        <input type="radio" id="rate4" name="rating" value="4">
                                        <label for="rate4" title="Not good">4 stars</label>

                                        <input type="radio" id="rate5" name="rating" value="5">
                                        <label for="rate5" title="Terrible">5 star</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-end">
                                            <button type="submit" class="btn btn-primary px-4">Send Message</button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div><!--end card-body-->
                        </div> <!--end card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
