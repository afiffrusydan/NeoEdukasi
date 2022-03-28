<title>Tentor Verification</title>
@extends('admin.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light block shadow-sm">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Tentor Detail
                        </h1>
                        <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                            Tentor Detail
                        </h5>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.tentor.index') }}">Tentor
                                    Detail</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block  shadow-sm">
            <div class="block block-rounded ">
                <div class="col-xl-12">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->

                            <div class="row">
                                <div class="col-xl-12 order-xl-0">
                                    <div class="col-12-line1 py-2">
                                        <div class="items-push float-lg-right">
                                            <select class="form-select form-control-xs selectpicker" id="status"
                                                title="Status">
                                                {{-- <option value="" disabled selected>Status</option> --}}
                                                <option value="10" {{ $tentorData->status == 10 ? 'selected' : '' }}
                                                    data-content='<span class="btn-success btn-sm btn-block text-center">Active</span>'>
                                                </option>
                                                <option value="0" {{ $tentorData->status == 0 ? 'selected' : '' }}
                                                    data-content='<span class="btn-warning btn-sm btn-block text-center">Inactive</span>'>
                                                </option>
                                                <option value="-10" {{ $tentorData->status == -10 ? 'selected' : '' }}
                                                    data-content='<span class="btn-danger btn-sm btn-block text-center">Blacklist</span>'>
                                                </option>
                                            </select>
                                        </div>
                                        <label class="form-label tittle">Tentor Detail</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Full Name</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Branch</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        value="{{ $tentorData->branch_name }}" disabled>
                                </div>
                                <div class="col-12 col-md-12 py-1 d-flex flex-column flex-1">
                                    <label class="form-label tittle-neo">Address</label>
                                    <input type="text" class="form-control body-block-3"
                                        value="{{ $tentorData->address }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">NIK</label>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        value="{{ $tentorData->NIK }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Gender</label>
                                    <input type="text" class="form-control body-block-3" value="{{ $tentorData->gender }}"
                                        disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Email</label>
                                    <input type="text" class="form-control body-block-3" value="{{ $tentorData->email }}"
                                        disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Place and Date of Birth</label>
                                    <input type="text" class="form-control body-block-3"
                                        value="{{ $tentorData->POB . ', ' . date('d M Y', strtotime($tentorData->DOB)) }}"
                                        disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Religion</label>
                                    <input type="text" class="form-control body-block-3"
                                        value="{{ ucwords($tentorData->religion) }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Bank Account</label>
                                    <input type="text" class="form-control body-block-3"
                                        value="{{ ucwords($tentorData->bank_name) }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Job Status</label>
                                    <input type="text" class="form-control body-block-3"
                                        value="{{ ucwords($tentorData->job_status) }}" disabled>
                                </div>
                                <div class="col-12 col-md-6 py-1">
                                    <label class="form-label tittle-neo">Last Education</label>
                                    <input type="text" class="form-control body-block-3"
                                        value=" {{ ucwords($tentorData->last_education) }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#status').on('change', function() {
            var selected = $(this).val();
            if(selected == 10){
                var selectedName = "Active";
                var buttonColor = "#6fa306";
            }else if(selected == 0){
                var selectedName = "Inactive";
                var buttonColor = "#ffc107";
            }else{
                var selectedName = "Blacklist";
                var buttonColor = "#dc3545";
            }
            Swal.fire({
                            title: 'Tentor Status',
                            text: "Are You Sure update tentors status to "+selectedName+"?",
                            icon: 'info',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Update',
                            confirmButtonColor : buttonColor
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: "{{ route('admin.tentor.status_update') }}",
                                    method: "POST",
                                    data: {
                                        id: "{{ $tentorData->id }}",
                                        status: selected,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        Swal.fire({
                                            title: 'Tentor Status Update',
                                            text: data,
                                            icon: 'success',
                                            showConfirmButton: false,
                                        });
                                        setTimeout(function() {
                                            document.location.reload()
                                        }, 1000);
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        });
        });
    </script>
@endsection
