<title>{{ 'Tentors Dashboard' }}</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="content block-rounded">
        <div class="bg-image" style="background-color: #dad5b7;">
            <div class="">
                <div class="content content-full text-center">
                    <div class="my-7">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white border-bottom shadow-sm">
            <div class="content content-boxed">
                <div class="row items-push">
                    <div class="col-3 col-md-1">
                        <img class="img-avatar" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar">
                    </div>
                    <div class="col-9 col-md-9">
                        <div class="font-size-h3 tittle-neo">
                            {{ $vacancy->first_name . ' ' . $vacancy->last_name }}
                        </div>
                        <div class="font-size-sm font-w600 text-muted text-uppercase">{{ $vacancy->branch_name }}</div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="row items-push float-sm-right ">
                            @if ($statusApplication == 'applied')
                                <button type="button" class="btn btn-md btn-block"
                                    disabled>
                                    <a href="" class="btn btn-md btn-neo pull-right btn-block disabled">Applied</a>
                                </button>
                            @else
                                <button type="button" class="btn btn-md btn-alt-secondary btn-block"
                                    title="Add New Student">
                                    <a href="{{ route('tentor.vacancy.apply', ['id' => $vacancy->vacancyId]) }}"
                                        class="btn btn-md btn-neo pull-right btn-block">Apply</a>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row items-push">
                    <div class="col-12 col-md-12">
                        <div class="font-size-md font-w600 tittle-neo">{{ $jobStatus }}</div>
                        <div class="font-size-sm font-w600 text-muted">Posted on
                            {{ date('d-M-y', strtotime($vacancy->vacancyCreateDate)) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded shadow-sm">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="g-3 col-12-line1">
                        <label class="form-label">Student Detail</label>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3 text-center">Gender</label>
                        <div class="font-size-md text-muted ml-4">{{ $vacancy->gender }}</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Religion</label>
                        <div class="font-size-md text-muted ml-4">{{ $vacancy->religion == ""? "-": ucfirst($vacancy->religion) }}</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Age</label>
                        <div class="font-size-md text-muted ml-4">
                            {{ \App\Http\Controllers\Tentor\TentorController::getAge($vacancy->DOB) }} Years Old</div>
                    </div>
                    <div class="col-xl-6 order-xl-0">
                        <label class="form-label tittle-neo ml-3">Address</label>
                        <div class="font-size-md text-muted ml-4">{{ $vacancy->address }}</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="block block-rounded shadow-sm">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="g-3 col-12-line1">
                        <label class="form-label">Job Description</label>
                    </div>
                    <div class="col-xl-12 order-xl-0">
                        <ul>
                            <li class="font-size-md text-muted py-1">{{ $vacancy->subject }}</li>
                            <li class="font-size-md text-muted py-1">{{ $vacancy->class }}</li>
                            <li class="font-size-md text-muted py-1">{{ $vacancy->curriculum }}</li>
                        </ul>
                    </div>
                    <div class="col-xl-12 order-xl-0">
                        <div class="font-size-md font-w600 text-muted"> Criteria</div>
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
