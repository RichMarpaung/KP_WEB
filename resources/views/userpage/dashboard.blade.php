@extends('...userpage.master')
@section('body')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Status KPI</p>
                                        <h3 class="mt-2 mb-0 fw-bold">{{ $user->status }}</h3>
                                        <p class="text-muted mt-2 fs-12">Pantau status KPI Anda untuk kemajuan proyek.</p>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-profile-circle h1 align-self-center mb-0 text-secondary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Tempat KPI</p>
                                        <h3 class="mt-2 mb-0 fw-bold">
                                            @if ($userGroup)
                                                {{ $userGroup->group->place->name }}
                                            @else
                                                Tidak ada
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-home-simple menu-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center pb-3">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold fs-14">Nama Kelompok</p>
                                        <h3 class="mt-2 mb-0 fw-bold">
                                            @if ($userGroup)
                                                {{ $userGroup->group->name }}
                                            @else
                                                Tidak ada
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-xl bg-light rounded-circle mx-auto">
                                            <i class="iconoir-journal-page menu-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
