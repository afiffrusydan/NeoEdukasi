<title>Tentor Verification</title>
@extends('admin.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Job Vacany Detail
                    </h1>
                    <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                        Form for job vacancy detail
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.vacancy.job-vacancy.index') }}">Job Vacancy</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Job Vacancy Detail
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded " style="position: sticky">
            <div class="block-content block-content-full">
                <div class="row ">
                    <div class="col-xl-12 order-xl-0">
                        <h4 class="tittle-neo my-2">
                            Job Vacancy Detail
                        </h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Selected Student Detail</label>
                        </div>
                        <div class="row g-3 col-12 py-2">
                            <div class="col-12">
                                <label class="form-label tittle-neo">Full Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                    value="{{ $students->first_name . ' ' . $students->last_name }}" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label tittle-neo">Address</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $students->address }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Class</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $students->class }}"
                                    disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Curriculum</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $students->curriculum }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <form method="POST" action="{{ route('admin.vacancy.job-vacancy.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="block">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                            <div class="row g-3 col-12-line1">
                                <label class="form-label tittle">Job Vacancy Detail</label>
                            </div>
                            <div class="row g-3 col-12 py-2">
                                <div class="col-12">
                                    <label class="form-label tittle-neo">Subject</label>
                                    <input name="id" type="hidden" value="{{ $students->id }}">
                                    <input type="text" id="subject" name="subject" class="form-control"
                                        placeholder="Subject" value="">
                                </div>
                                <div class="col-12" id="dynamicAddRemove">
                                    <label class="form-label tittle-neo">Criteria</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="criteria[0]" placeholder="Criteria"
                                            class="form-control" />
                                        <div class="input-group-append">
                                            <button type="button" name="add" id="dynamic-ar" class="btn btn-primary"
                                                type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 col-12 d-flex justify-content-center py-2">
                            <button class="btn btn-neo" name="submit" type="submit">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<div id="removeit"class="input-group mb-3"><input type="text" name="criteria[' + i +
                ']" placeholder="Criteria" class="form-control" /> <div class="input-group-append"><button type="button" class="btn btn-danger remove-input-field">x</button></div></div>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('#removeit').remove();
        });


        $(function() {
            $('#subject').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('preview-subject').value = nameValisession;
            });
            $("#ijazah-status").on("change", function() {
                if ($(this).val() === "1") {
                    document.getElementById('ijazah-status-review').value = "Accept";
                } else {
                    document.getElementById('ijazah-status-review').value = "Decline";
                }
            });
        });
    </script>
@endsection
