<title>{{ 'Pengaturan Akun Bank' }}</title>
@extends('tentor.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Bank Account
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('tentor.profile') }}">Profile</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Bank Account
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="be_pages_ecom_store_checkout.html" method="POST" onsubmit="return false;">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Bank Account</h3>
                        </div>
                        @if ($bankAccount != null)
                            <div class="block-content block-content-full ">
                                <div class="mx-0 mx-md-12 mx-xl-12">
                                    <table class="table table-hover table-vcenter">
                                        <tbody>
                                            <tr>
                                                <td class="fw-semibold fs-sm">
                                                    {{ $bankAccount->bank_account }}
                                                </td>
                                                <td class="fs-sm">{{ $bankAccount->bank_name }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button id="editBankAccount" type="button"
                                                            class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="block-content block-content-full" id="addBankAccount" style=" @if ($bankAccount != null) {{ 'display:none' }} @endif">
                            <form id="ajaxform">
                                <div class="mx-0 mx-md-12 mx-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label tittle-neo">Bank Name</label>
                                        <select class="form-control selectpicker" id="select-bank" data-live-search="true"
                                            data-size="4">
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-0 mx-md-12 mx-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label tittle-neo">Account Number</label>
                                        <input type="text" id="account-number" class="form-control text-left align-bottom">
                                    </div>
                                </div>
                                <div class="mx-0 mx-md-12 mx-xl-12">
                                    <div class="mb-3 text-center">
                                        <button type="button" class="btn btn-sm btn-alt-secondary btn-block"
                                            title="Check Bank Account">
                                            <a id="check" href="\#" class="btn btn-sm btn-neo pull-right btn-block">Check</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <script>
        var elem = document.getElementById('addBankAccount');
        $("#editBankAccount").click(function(event) {
            if (window.getComputedStyle(elem).display === "none") {
                elem.style.display = "block";
            } else {
                elem.style.display = "none";
            }
        });
    </script>
    <script>
        $("#check").click(function(event) {
            event.preventDefault();
            let id = $("#select-bank").val();
            let number = $("#account-number").val();
            Swal.fire({
                        title: "",
                        text: "Please wait",
                        imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
            $.ajax({
                url: "{{ route('tentor.checkbank') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    number: number,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == "INVALID_ACCOUNT_NUMBER") {
                        Swal.fire({
                            title: 'Bank Account Detail',
                            text: "Invalid Bank Account Number, Please check and try again",
                            icon: 'error',
                            showCloseButton: true,
                            showCancelButton: true,
                            cancelButtonText: 'Close',
                            showConfirmButton: false
                        });
                    } else if (response.status == "PENDING") {
                        Swal.fire({
                            title: 'Bank Account Detail',
                            text: "Please Try Again",
                            icon: 'info',
                            showCloseButton: true,
                            showCancelButton: true,
                            cancelButtonText: 'Close',
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Bank Account Detail',
                            text: "Bank Account Holder : " + response.account_holder,
                            icon: 'success',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonColor: "#6fa306",
                            confirmButtonText: 'Save'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: "{{ route('tentor.updatebank') }}",
                                    method: "POST",
                                    data: {
                                        id: id,
                                        number: number,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        Swal.fire({
                                            title: 'Bank Account Update',
                                            text: data,
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                        setTimeout(function() {
                                            document.location.reload()
                                        }, 3000);
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
