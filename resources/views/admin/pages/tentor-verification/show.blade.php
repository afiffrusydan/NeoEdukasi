<title>Verifikasi Akun Tentor</title>
@extends('admin.layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded ">
            <div class="bg-body-light border-right-neo">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h1 class="h3 fw-bold mb-2">
                                Verifikasi Akun Tentor
                            </h1>
                        </div>
                        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="{{ route('admin.tentor-verification.index') }}">Verifikasi Akun Tentor</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    {{ $tentorData->first_name . ' ' . $tentorData->last_name }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <form id="tentorVerification" method="POST"
                            action="{{ route('admin.tentor-verification.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="smartwizard" class="sw-main sw-theme-dots sw-justified">
                                <ul class="nav step-anchor">
                                    <li class="nav-item text-center"><a href="#step-1" class="nav-link"><small>
                                                Informasi Tentor</small></a></li>
                                    <li class="nav-item text-center"><a href="#step-2" class="nav-link"><small>
                                                KTP</small></a></li>
                                    <li class="nav-item"><a href="#step-3" class="nav-link"><small>
                                                Ijazah</small></a></li>
                                    <li class="nav-item"><a href="#step-4" class="nav-link"><small>
                                                Transkip Nilai</small></a></li>
                                    <li class="nav-item"><a href="#step-5" class="nav-link"><small>Konfirmasi
                                            </small></a></li>
                                </ul>
                                <div class="tab-content py-2">
                                    <div id="step-1" class="tab-pane step-content" role="tabpanel" aria-labelledby="step-1">
                                        <div class="row g-3 col-12-line1">
                                            <label class="form-label tittle">Informasi Tentor</label>
                                        </div>
                                        <div class="row g-3 col-12">
                                            <div class="col-12 col-md-12 py-1">
                                                <label class="form-label tittle-neo">Nama Lengkap</label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                    value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">NIK</label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                    value="{{ $tentorData->NIK }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Cabang</label>
                                                <input type="text" class="form-control" placeholder="First Name"
                                                    value="{{ $tentorData->branch_name }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-12 py-1 d-flex flex-column flex-1">
                                                <label class="form-label tittle-neo">Alamat</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ $tentorData->address }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Jenis Kelamin</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ $tentorData->gender }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Email</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ $tentorData->email }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Tempat, Tanggal lahir</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ $tentorData->POB . ', ' . date('d M Y', strtotime($tentorData->DOB)) }}"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Agama</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ ucwords($tentorData->religion) }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Pekerjaan</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value="{{ ucwords($tentorData->job_status) }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6 py-1">
                                                <label class="form-label tittle-neo">Pendidikan Terakhir</label>
                                                <input type="text" class="form-control body-block-3"
                                                    value=" {{ ucwords($tentorData->last_education) }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="step-2" class="tab-pane step-content" role="tabpanel" aria-labelledby="step-2">
                                        <div class="row g-3 col-12-line1">
                                            <label class="form-label tittle">Informasi KTP</label>
                                        </div>
                                        <div class="row g-3 col-12">
                                            <div class="form-group col-md-12">
                                                <label class="tittle-neo">NIK</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="{{ $tentorData->NIK }}" readonly="readonly" />
                                                <input id="id" name="id" type="hidden" value="{{ $tentorData->id }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label tittle-neo">File KTP</label>
                                                <div class="embed-responsive" style="padding-bottom: 40%">

                                                    <object
                                                        data="{{ route('admin.tentor-verification.get-ktp', ['id' => $tentorData->id]) }}"
                                                        type='application/pdf'></object>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="tittle-neo">Status</label>
                                                <div class="form-group ">
                                                    <select name="ktp_status" id="ktp-status" class="form-control">
                                                        <option value="" disabled selected>
                                                            Status</option>
                                                        <option value="1">Terima</option>
                                                        <option value="0">Tolak</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div id="ktp-declinereason-div" class="form-group col-md-12">
                                                <label class="tittle-neo">Alasan</label>
                                                <textarea class="form-control" name="ktp_declinereason" id="ktp-declinereason" rows="2" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-3" class="tab-pane step-content" role="tabpanel" aria-labelledby="step-3">
                                        <div class="row g-3 col-12-line1">
                                            <label class="form-label tittle">Informasi Ijazah</label>
                                        </div>
                                        <div class="row g-3 col-12">
                                            <div class="form-group col-md-12">
                                                <label class="form-label tittle-neo">File Ijazah</label>
                                                <div class="embed-responsive" style="padding-bottom: 40%">

                                                    <object
                                                        data="{{ route('admin.tentor-verification.get-ijazah', ['id' => $tentorData->id]) }}"
                                                        type='application/pdf'></object>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="tittle-neo">Status</label>
                                                <select name="ijazah_status" id="ijazah-status" class="form-control">
                                                    <option value="" disabled selected>
                                                        Status</option>
                                                    <option value="1">Terima</option>
                                                    <option value="0">Tolak</option>
                                                </select>
                                            </div>

                                            <div id="ijazah-declinereason-div" class="form-group col-md-12" disabled>
                                                <label class="tittle-neo">Alasan</label>
                                                <textarea class="form-control" name="ijazah_declinereason" id="ijazah-declinereason" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-4" class="tab-pane step-content" role="tabpanel" aria-labelledby="step-4">
                                        <div class="row g-3 col-12-line1">
                                            <label class="form-label tittle">Informasi Transkip Nilai</label>
                                        </div>
                                        <div class="row g-3 col-12">
                                            <div class="form-group col-md-12">
                                                <label class="form-label tittle-neo">File Transkip Nilai</label>
                                                <div class="embed-responsive" style="padding-bottom: 40%">

                                                    <object
                                                        data="{{ route('admin.tentor-verification.get-transkip', ['id' => $tentorData->id]) }}"
                                                        type='application/pdf'></object>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="tittle-neo">Status</label>
                                                <select name="transkip_status" id="transkip-status" class="form-control">
                                                    <option value="" disabled selected>
                                                        Status</option>
                                                    <option value="1">Terima</option>
                                                    <option value="0">Tolak</option>
                                                </select>
                                            </div>

                                            <div id="transkip-declinereason-div" class="form-group col-md-12" disabled>
                                                <label class="tittle-neo">Alasan</label>
                                                <textarea class="form-control" name="transkip_declinereason" id="transkip-declinereason" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-5" class="tab-pane step-content" role="tabpanel"
                                        aria-labelledby="step-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="tittle-neo">Status Verifikasi KTP</label>
                                                    <input type="text" class="form-control" name="ktp-status-review"
                                                        id="ktp-status-review" readonly="readonly">
                                                </div>
                                                <div id="ktp-review-div" class="form-group col-md-12"
                                                    style="display: none;">
                                                    <textarea class="form-control" name="ktp-review" id="ktp-review" rows="3" readonly="readonly"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="tittle-neo">Status Verifikasi Ijazah</label>
                                                    <input type="text" class="form-control" name="ijazah-status-review"
                                                        id="ijazah-status-review" readonly="readonly">
                                                </div>
                                                <div id="ijazah-review-div" class="form-group col-md-12"
                                                    style="display: none;">
                                                    <textarea class="form-control" name="ijazah-review" id="ijazah-review" rows="3" readonly="readonly"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="tittle-neo">Status Verifikasi Transkip Nilai</label>
                                                    <input type="text" class="form-control" name="transkip-status-review"
                                                        id="transkip-status-review" readonly="readonly">
                                                </div>
                                                <div id="transkip-review-div" class="form-group col-md-12"
                                                    style="display: none;">
                                                    <textarea class="form-control" name="transkip-review" id="transkip-review" rows="3" readonly="readonly"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
            if (stepPosition === 'first') {
                $(".btn-finish").hide();
                $(".sw-btn-next").show();
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'last') {
                $(".sw-btn-next").hide();
                $(".btn-finish").show();
            } else {
                $(".btn-finish").hide();
                $(".sw-btn-next").show();
                $("#prev-btn").removeClass('disabled');
            }
        });
        $(document).ready(function() {
            var value = document.getElementById("ktp-status").value;
            if (value === "0") {
                $("#ktp-declinereason").prop("disabled", false);
            } else {
                $("#ktp-declinereason").prop("disabled", true);
                $("#ktp-declinereason").val('');
            }
            $("#ktp-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#ktp-declinereason").prop("disabled", false);
                    $("#ktp-review-div").show();
                    document.getElementById('ktp-status-review').value = "Ditolak";
                } else {
                    document.getElementById('ktp-status-review').value = "Diterima";
                    $("#ktp-declinereason").prop("disabled", true);
                    $("#ktp-declinereason").val('');
                    $("#ktp-review").val('');
                    $("#ktp-review-div").hide();
                }
            });
        });

        $(document).ready(function() {
            var value = document.getElementById("ijazah-status").value;
            if (value === "0") {
                $("#ijazah-declinereason").prop("disabled", false);
            } else {
                $("#ijazah-declinereason").prop("disabled", true);
                $("#ijazah-declinereason").val('');
            }
            $("#ijazah-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#ijazah-declinereason").prop("disabled", false);
                    $("#ijazah-review-div").show();
                    document.getElementById('ijazah-status-review').value = "Ditolak";
                } else {
                    document.getElementById('ijazah-status-review').value = "Diterima";
                    $("#ijazah-declinereason").prop("disabled", true);
                    $("#ijazah-declinereason").val('');
                    $("#ijazah-review").val('');
                    $("#ijazah-review-div").hide();
                }
            });
        });

        $(document).ready(function() {
            var value = document.getElementById("transkip-status").value;
            if (value === "0") {
                $("#transkip-declinereason").prop("disabled", false);
            } else {
                $("#transkip-declinereason").prop("disabled", true);
                $("#transkip-declinereason").val('');
            }
            $("#transkip-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#transkip-declinereason").prop("disabled", false);
                    $("#transkip-review-div").show();
                    document.getElementById('transkip-status-review').value = "Ditolak";
                } else {
                    document.getElementById('transkip-status-review').value = "Diterima";
                    $("#transkip-declinereason").prop("disabled", true);
                    $("#transkip-declinereason").val('');
                    $("#transkip-review").val('');
                    $("#transkip-review-div").hide();
                }
            });
        });

        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect: 'fade',
            autoAdjustHeight: true,
            contentCache: false,
            enableFinishButton: false,

            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'center', // left, right, center
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [
                    $('<button></button>').text('Save Changes')
                    .addClass('btn btn-neo btn-finish')
                    .on('click', function() {
                        document.getElementById("tentorVerification").submit()
                    }),
                ]
            },
            anchorSettings: {
                markDoneStep: true, // Add done state on navigation
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
        });


        $(function() {
            $('#transkip-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('transkip-review').value = nameValisession;
            });
        });

        $(function() {
            $('#ijazah-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('ijazah-review').value = nameValisession;
            });
        });

        $(function() {
            $('#ktp-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('ktp-review').value = nameValisession;
            });
        });
    </script>
@endsection
