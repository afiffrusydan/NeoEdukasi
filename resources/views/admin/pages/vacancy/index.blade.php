<title>Tentor Verification</title>
@extends('admin.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Job Vacancy
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.vacancy.job-vacancy.index') }}">Job Vacancy</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Home
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->

        <!-- END Hero -->
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-content block-content-full" >
                <div class="row">
                    <div class="col-xl-12 order-xl-0">
                        <div class="row items-push float-sm-right ">
                            <button type="button" class="btn btn-md btn-alt-secondary" title="Add New Student">
                                <a href="{{ route('admin.vacancy.job-vacancy.create1') }}"
                                    class="btn btn-md btn-neo pull-right">Add New Job Vacancy</a>
                            </button>
                        </div>
                        <h4 class="tittle-neo my-2">
                            Job Vacancy
                        </h4>
                    </div>

                </div>
            </div>
        </div>

        @foreach ($vacancys as $vacancy)
        <a class=" " href="{{ route('admin.vacancy.job-vacancy.show', ['id'=>$vacancy->id])}}">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-xl-9 order-xl-0">
                            <div class="mb-1 h5 text-black-75 py-2">
                                {{ $vacancy->first_name.' '.$vacancy->last_name }}
                            </div>
                            <div class="mb-1 h6 text-black-50 py-1">
                                Job Vacancy Status
                            </div>
                            <div class="mb-1 h6 text-black-50 py-1">
                                {{ $vacancy->created_at }}
                            </div>

                            <div>
                                <a href="{{ route('admin.vacancy.job-vacancy.show', ['id'=>$vacancy->id]) }}">Detail</a>
                            </div>
                        </div>

                        <div class="col-xl-3  text-center">
                            <div style="font-size: 70px">
                                {{ \App\Http\Controllers\Admin\Admin_VacancyController::getApplicant($vacancy->id) }}
                            </div>
                            Job Applicants
                        </div>
                    </div>
                </div>
            </div>
        </a>
            @endforeach

        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

    
@endsection

