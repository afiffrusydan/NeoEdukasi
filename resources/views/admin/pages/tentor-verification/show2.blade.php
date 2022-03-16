<title>Tentor Verification</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tentor Verification Detail<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tentor Verification Detail</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 order-xl-0">
                <div class="block block-rounded">
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-md-4">
                                <div class="row g-sm js-gallery img-fluid-100 js-gallery-enabled">
                                    <div class="col-12 mb-3">
                                        <a class="img-link img-link-zoom-in img-lightbox">
                                            <img class="img-responsive"
                                                src="{{ asset('storage/tentors/tentor-photo-profile/' . $tentors->id . '.jpg') }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <div>
                                        <div class="fs-sm fw-semibold">
                                            <p class="h2">
                                                {{ $tentors->first_name . ' ' . $tentors->last_name }}</p>
                                        </div>
                                        <div class="fs-sm text-muted">{{ $tentors->job_status }}</div>
                                    </div>
                                    <div class="fs-2 fw-bold">
                                        {{ $tentors->branch_name }}
                                    </div>
                                </div>
                                <div class="mb-4 border-top border-bottom">
                                    <table class="table table-borderless table-responsive no-footer">
                                        <tbody>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 30%">
                                                    <label class="tittle-neo">NIK</label>
                                                </td>

                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->NIK) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 30%">
                                                    <label class="tittle-neo">Address</label>
                                                </td>

                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->address) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Email</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->email) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Gender</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->gender) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Place & date of
                                                        birth</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->POB) . ', ' . date('d F Y', strtotime($tentors->DOB)) }}
                                                </td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Phone Number</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ $tentors->phone_number }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Religion</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->religion) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold fs-sm" style="width: 35%">
                                                    <label class="tittle-neo">Last Education</label>
                                                </td>
                                                <td class="fs-sm">
                                                    {{ ucfirst($tentors->last_education) }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="block block-rounded">
                            <div class="block-content tab-content" style="padding-bottom: 50px">
                                <div class="tab-pane pull-x active" id="ktp-verification" role="tabpanel"
                                    aria-labelledby="ecom-product-info-tab">
                                    <div class="row justify-content-center">
                                        <div id="detail_div_a4" class="col-md-12">
                                            <table class="table table-striped table-borderless">
                                                <thead>

                                                </thead>
                                                <tbody>
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row d-flex justify-content-center mb-200"> <button type="button"
                                                    class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Verify</button> </div> <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ $tentors->first_name . ' ' . $tentors->last_name . ' Verification' }}
                                                            </h5> <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close"> <span
                                                                    aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="tentorVerification" method="POST"
                                                                action="{{ route('admin.tentor.verification-submit') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div id="smartwizard" class="sw-main sw-theme-progress">
                                                                    <ul class="nav nav-tabs step-anchor">
                                                                        <li class="nav-item active"><a href="#step-1"
                                                                                class="nav-link"><br><small>ID
                                                                                    Information</small></a></li>
                                                                        <li class="nav-item"><a href="#step-2"
                                                                                class="nav-link"><br><small>
                                                                                    Education Information</small></a></li>
                                                                        <li class="nav-item"><a href="#step-3"
                                                                                class="nav-link"><br><small>Education
                                                                                    Information</small></a></li>
                                                                        <li class="nav-item"><a href="#step-4"
                                                                                class="nav-link"><br><small>Confirmation
                                                                                </small></a></li>
                                                                    </ul>
                                                                    <div class=" tab-content py-2"
                                                                        style="min-height: 550px;">
                                                                        <div id="step-1" class="tab-pane step-content">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="tittle-neo">NIK</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="name"
                                                                                        id="name"
                                                                                        placeholder="{{ $tentors->NIK }}"
                                                                                        readonly="readonly" />
                                                                                    <input id="id" name="id" type="hidden"
                                                                                        value="{{ $tentors->id }}">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <embed
                                                                                        src="{{ route('admin.tentor.get-ktp', ['id' => $tentors->id]) }}"
                                                                                        frameborder="0" width="100%"
                                                                                        height="250px" scale="tofit">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="tittle-neo">Status</label>
                                                                                    <select name="ktp_status"
                                                                                        id="ktp-status"
                                                                                        class="form-control">
                                                                                        <option value="" disabled selected>
                                                                                            Status</option>
                                                                                        <option value="1"> Accept </option>
                                                                                        <option value="0">Decline</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div id="ktp-declinereason-div"
                                                                                    class="form-group col-md-12"
                                                                                    style="display: none;">
                                                                                    <label
                                                                                        class="tittle-neo">Reason</label>
                                                                                    <textarea class="form-control"
                                                                                        name="ktp_declinereason"
                                                                                        id="ktp-declinereason"
                                                                                        rows="2"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="step-2" class="tab-pane step-content">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <embed
                                                                                        src="{{ route('admin.tentor.get-ijazah', ['id' => $tentors->id]) }}"
                                                                                        frameborder="0" width="100%"
                                                                                        height="250px">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="tittle-neo">Status</label>
                                                                                    <select name="ijazah_status"
                                                                                        id="ijazah-status"
                                                                                        class="form-control">
                                                                                        <option value="" disabled selected>
                                                                                            Status</option>
                                                                                        <option value="1">Accept</option>
                                                                                        <option value="0">Decline</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div id="ijazah-declinereason-div"
                                                                                    class="form-group col-md-12"
                                                                                    style="display: none;">
                                                                                    <label
                                                                                        class="tittle-neo">Reason</label>
                                                                                    <textarea class="form-control"
                                                                                        name="ijazah_declinereason"
                                                                                        id="ijazah-declinereason"
                                                                                        rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="step-3" class="tab-pane step-content">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <embed
                                                                                        src="{{ route('admin.tentor.get-transkip', ['id' => $tentors->id]) }}"
                                                                                        frameborder="0" width="100%"
                                                                                        height="250px">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label
                                                                                        class="tittle-neo">Status</label>
                                                                                    <select name="transkip_status"
                                                                                        id="transkip-status"
                                                                                        class="form-control">
                                                                                        <option value="" disabled selected>
                                                                                            Status</option>
                                                                                        <option value="1">Accept</option>
                                                                                        <option value="0">Decline</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div id="transkip-declinereason-div"
                                                                                    class="form-group col-md-12"
                                                                                    style="display: none;">
                                                                                    <label
                                                                                        class="tittle-neo">Reason</label>
                                                                                    <textarea class="form-control"
                                                                                        name="transkip_declinereason"
                                                                                        id="transkip-declinereason"
                                                                                        rows="3"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="step-4" class="tab-pane step-content">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group col-md-12">
                                                                                        <label class="tittle-neo">KTP
                                                                                            Status</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="ktp-status-review"
                                                                                            id="ktp-status-review"
                                                                                            readonly="readonly">
                                                                                    </div>
                                                                                    <div id="ktp-review-div"
                                                                                        class="form-group col-md-12"
                                                                                        style="display: none;">
                                                                                        <textarea class="form-control"
                                                                                            name="ktp-review"
                                                                                            id="ktp-review" rows="3"
                                                                                            readonly="readonly"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="tittle-neo">Ijazah
                                                                                            Status</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="ijazah-status-review"
                                                                                            id="ijazah-status-review"
                                                                                            readonly="readonly">
                                                                                    </div>
                                                                                    <div id="ijazah-review-div"
                                                                                        class="form-group col-md-12"
                                                                                        style="display: none;">
                                                                                        <textarea class="form-control"
                                                                                            name="ijazah-review"
                                                                                            id="ijazah-review" rows="3"
                                                                                            readonly="readonly"></textarea>
                                                                                    </div>
                                                                                    <div class="form-group col-md-12">
                                                                                        <label
                                                                                            class="tittle-neo">Transkip
                                                                                            Status</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="transkip-status-review"
                                                                                            id="transkip-status-review"
                                                                                            readonly="readonly">
                                                                                    </div>
                                                                                    <div id="transkip-review-div"
                                                                                        class="form-group col-md-12"
                                                                                        style="display: none;">
                                                                                        <textarea class="form-control"
                                                                                            name="transkip-review"
                                                                                            id="transkip-review" rows="3"
                                                                                            readonly="readonly"></textarea>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <script>
        $(document).ready(function() {
            var value = document.getElementById("ktp-status").value;
            if (value === "0") {
                $("#ktp-declinereason-div").show();
            } else {
                $("#ktp-declinereason-div").hide();
            }
            $("#ktp-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#ktp-declinereason-div").show();
                    $("#ktp-review-div").show();
                } else {
                    $("#ktp-declinereason-div").hide();
                }
            });
        });

        $(document).ready(function() {
            var value = document.getElementById("ijazah-status").value;
            if (value === "0") {
                $("#ijazah-declinereason-div").show();
            } else {
                $("#ijazah-declinereason-div").hide();
            }
            $("#ijazah-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#ijazah-declinereason-div").show();
                    $("#ijazah-review-div").show();
                } else {
                    $("#ijazah-declinereason-div").hide();
                }
            });
        });

        $(document).ready(function() {
            var value = document.getElementById("transkip-status").value;
            if (value === "0") {
                $("#transkip-declinereason-div").show();
            } else {
                $("#transkip-declinereason-div").hide();
            }
            $("#transkip-status").on("change", function() {
                if ($(this).val() === "0") {
                    $("#transkip-declinereason-div").show();
                    $("#transkip-review-div").show();
                } else {
                    $("#transkip-declinereason-div").hide();
                    $("#transkip-review-div").hide();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'progress',
            transitionEffect: 'fade',
            autoAdjustHeight: true,
            showStepURLhash: false,
            transition: {
                animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                speed: '400', // Transion animation speed
                easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
            },

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
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: true, // Activates all anchors clickable all times
                markDoneStep: true, // Add done state on navigation
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
            keyboardSettings: {
                keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                keyLeft: [37], // Left key code
                keyRight: [39] // Right key code
            },
            lang: { // Language variables for button
                next: 'Next >',
                previous: '< Previous'
            },
            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Highlight step with errors
            hiddenSteps: [] // Hidden steps
        });
    </script>
    <script>
        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            if ($('button.sw-btn-next').hasClass('disabled')) {
                $(".btn-finish").show();
                $('.sw-btn-next').hide(); // show the button extra only in the last page
                $('.sw-btn-prev').hide(); // show the button extra only in the last page
            } else {
                $(".btn-finish").hide();
                $('.sw-btn-next').show(); // show the button extra only in the last page
                $('.sw-btn-prev').show(); // show the button extra only in the last page
            }
        });
    </script>

    <script>
        $(function() {
            $('#transkip-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('transkip-review').value = nameValisession;
            });
            $("#transkip-status").on("change", function() {
                if ($(this).val() === "1") {
                    document.getElementById('transkip-status-review').value = "Accept";
                } else {
                    document.getElementById('transkip-status-review').value = "Decline";
                }
            });
        });

        $(function() {
            $('#ijazah-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('ijazah-review').value = nameValisession;
            });
            $("#ijazah-status").on("change", function() {
                if ($(this).val() === "1") {
                    document.getElementById('ijazah-status-review').value = "Accept";
                } else {
                    document.getElementById('ijazah-status-review').value = "Decline";
                }
            });
        });

        $(function() {
            $('#ktp-declinereason').on('input', function() {
                var nameValisession = $(this).val();
                document.getElementById('ktp-review').value = nameValisession;
            });
            $("#ktp-status").on("change", function() {
                if ($(this).val() === "1") {
                    document.getElementById('ktp-status-review').value = "Accept";
                } else {
                    document.getElementById('ktp-status-review').value = "Decline";
                }
            });
        });
    </script>

    <!-- END Hero -->
    <!-- Dynamic Table Full -->
    <!-- END Page Content -->
@endsection
