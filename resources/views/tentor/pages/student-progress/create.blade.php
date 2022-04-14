<title>Add Student Progress Report</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Hero -->
    <title>Laravel Bootstrap Datepicker</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full  border-right-neo">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Add New Student Progress Report<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('tentor.progress-report.index') }}">Student Progress Report</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Add New</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Dynamic Table Full -->
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
            <form method="POST" action="{{ route('tentor.progress-report.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="col-12-line1">
                        <label class="form-label tittle">Student Progress Report</label>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Student Name</label>
                                <select class="form-control selectpicker" id="studentId" name="tentored_id"
                                    data-live-search="true" data-size="4">
                                    <option value="0" selected disabled>
                                        Please Select
                                    </option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->stdId }}">
                                            {{ $student->first_name . ' ' . $student->last_name . '  ( ' . $student->subject . ' )' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Month</label>
                                <select class="form-control selectpicker" id="monthSelect" name="month" disabled>
                                    <option value="0" selected disabled>
                                        Please Select
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Learning Progression</label>
                                <textarea name="learning_progression" class="form-control" required autofocus
                                    rows="3">{{ old('address') }}</textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Study Target</label>
                                <textarea name="study_target" class="form-control" required autofocus rows="3">{{ old('address') }}</textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Study Method</label>
                                <input type="text" name="study_method" class="form-control"
                                    value="{{ old('first_name') }}" required autofocus>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Feedback</label>
                                <textarea name="feedback" class="form-control" required autofocus rows="3">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 col-12 d-flex justify-content-center mt-200 mt-4">
                        <button class="btn btn-neo btn-sm" name="submit" type="submit">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Page Content -->
    <script>
        $('#studentId').on('change', function() {
            var selected = $(this).val();
            $.ajax({
                url: "{{ route('tentor.progress-report.get-month') }}",
                type: "POST",
                // dataType: 'json',
                data: {
                    id: selected,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let optionList = document.getElementById('monthSelect').options;
                    if (response.length != 0) {
                        $("#monthSelect").prop("disabled", false);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Please Select</option>");

                        response.forEach(response =>
                            optionList.add(
                                new Option(response.text, response.id)
                            )
                        );
                    } else {
                        $("#monthSelect").prop("disabled", true);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Please Select</option>");
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
