<title>Detail Lowongan Pekerjaan</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="content block-rounded">
        <div class="bg-image">

            <img class="rounded" src="{{ asset('images/Asset/header-vacancy-detail.png') }}" alt="Header Avatar"
                style="max-width:100%;">
        </div>
        <div class="bg-white border-bottom shadow-sm bg-header-tentor" style="
            background-image:url({{ asset('images/Asset/header-tentors-detail-big.png') }});">
            <div class="content content-boxed">
                <div class="row ">
                    <div class="order-3 col-12 col-md-12 order-md-1">
                        <div class="d-flex float-sm-right">
                            @if ($statusApplication == 'applied')
                                <button type="button" class="btn btn-sm btn-block" disabled>
                                    <a href="" class="btn btn-sm btn-neo pull-right btn-block disabled">Applied</a>
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-alt-secondary btn-block"
                                    title="Add New Student">
                                    <a href="{{ route('tentor.vacancy.apply', ['id' => Crypt::encrypt($vacancy->vacancyId)]) }}"
                                        class="btn btn-sm btn-neo pull-right btn-block">Apply</a>
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="order-2 col-12 col-md-12 order-md-2 mx-4 pb-2">
                        <div class="row">
                            <div class="col-3 col-md-1">
                                <img class="img-avatar" src="{{ asset('images/Asset//vacancy-avatar.png') }}"
                                    alt="Header Avatar">
                            </div>
                            <div class="col-9 col-md-9 align-items-center justify-content-center">
                                <div class="font-size-h3 neo mt-1">
                                    {{ $vacancy->first_name . ' ' . $vacancy->last_name }}
                                </div>
                                <div class="font-size-sm font-w600 tittle-vacancy-section-branch text-uppercase">
                                    {{ $vacancy->branch_name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-2 col-12 col-md-12 order-md-3 mx-2">
                        <div class="row mb-2">
                            <div class="col-12 col-md-12 mx-3">
                                <div class="tittle-neo">{{ $jobStatus }}</div>
                                <div class="tittle-vacancy-section-address">Posted on
                                    {{ date('d-M-y', strtotime($vacancy->vacancyCreateDate)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded shadow-sm border-right-neo">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="g-3 col-12-line1">
                        <label class="form-label">Detail Siswa</label>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3 text-center">Gender</label>
                        <div class="font-size-md text-muted ml-4">{{ $vacancy->gender }}</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Agama</label>
                        <div class="font-size-md text-muted ml-4">
                            {{ $vacancy->religion == '' ? '-' : ucfirst($vacancy->religion) }}</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Umur</label>
                        <div class="font-size-md text-muted ml-4">
                            {{ \App\Http\Controllers\Tentor\TentorController::getAge($vacancy->DOB) }} Years Old</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Alamat</label>
                        <div class="font-size-md text-muted ml-4">{{ $vacancy->address }}</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="block block-rounded shadow-sm border-right-neo">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="g-3 col-12-line1">
                        <label class="form-label">Detail Pekerjaan</label>
                    </div>
                    <div class="col-xl-12 order-xl-0">
                        <ul>
                            <li class="font-size-md text-muted py-1">Mata Pelajaran : {{ $vacancy->subject }}</li>
                            <li class="font-size-md text-muted py-1">Kelas : {{ $vacancy->class }}</li>
                            <li class="font-size-md text-muted py-1">Kurikulum :{{ $vacancy->curriculum }}</li>
                        </ul>
                    </div>
                    <div class="col-xl-12 order-xl-0">
                        <div class="font-size-md font-w600 text-muted"> Kriteria Tentor</div>
                        <ul>
                            @foreach (explode('~', $vacancy->criteria) as $criteria)
                                <li class="font-size-md text-muted py-1"> {{ $criteria }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- END Page Content -->
@endsection
