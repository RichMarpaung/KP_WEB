@extends('userpage.master')
@section('body')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 offset-lg-1 align-self-center">
                                        <div class="p-3">
                                            <span class="bg-pink-subtle p-1 rounded text-pink fw-medium">Recomend </span>
                                            <h1 class="my-4 font-weight-bold text-primary">{{ $rekomendasi->name }} </h1>
                                            <p class="fs-14 text-muted">{{ $rekomendasi->description }}</p>
                                            <p class="card-text">
                                                Rating:
                                                @php
                                                    $avgRating = floor($rekomendasi->reviews_avg_rating); // Bulatkan rata-rata rating
                                                @endphp
                                                @for ($i = 1; $i <= $avgRating; $i++)
                                                    ⭐
                                                @endfor
                                                @for ($i = $avgRating + 1; $i <= 5; $i++)
                                                    ☆
                                                @endfor
                                                ({{ number_format($rekomendasi->reviews_avg_rating, 1) }}) <!-- Tampilkan rata-rata rating -->
                                            </p>
                                            <button type="button" onclick="window.location.href='{{ route('review_tempat', ['id' => Crypt::encrypt($rekomendasi->id)]) }}'" class="btn btn-primary">Lihat Ulasan</button>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-5 offset-lg-1 text-center">

                                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ $rekomendasi->photo }}" class="d-block w-100"
                                                        alt="...">
                                                </div>

                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
                <h1>List Tempat</h1>
                <div class="row">
                    @foreach ($tempat as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $item->photo }}" class="img-fluid rounded-start"
                                        alt="...">
                                </div><!--end col-->
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">
                                            Rating:
                                            @php
                                                $avgRating = floor($item->reviews_avg_rating); // Bulatkan rata-rata rating
                                            @endphp
                                            @for ($i = 1; $i <= $avgRating; $i++)
                                                ⭐
                                            @endfor
                                            @for ($i = $avgRating + 1; $i <= 5; $i++)
                                                ☆
                                            @endfor
                                            ({{ number_format($item->reviews_avg_rating, 1) }}) <!-- Tampilkan rata-rata rating -->
                                        </p>
                                        <p>
                                        <small class="text-body-secondary">Total Reviews: {{ $item->reviews_count }}</small></p>
                                        <a href="{{ route('review_tempat', ['id' => Crypt::encrypt($item->id)]) }}" class="btn btn-primary btn-sm">Ulasan</a>
                                    </div>

                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end card-->
                    </div><!--end col-->
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
