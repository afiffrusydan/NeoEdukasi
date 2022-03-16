<title>Verification</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Verivication
                    </h1>
                    <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                        Verification Form
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('tentor.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Verification
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
                <form enctype="multipart/form-data" method="post" action="{{ route('tentor_id_verify') }}"
                    id="formverify">
                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title neo">Tentor Verification</h4>
                    </div>
                    <div id="error-msg" class="alert alert-danger" style="display:none; font-size: small;">
                    </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}"
                                    readonly="readonly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="tittle-neo" for="NIK">NIK</label>
                                <input type="text" class="form-control" name="nik" id="NIK"
                                    onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="16">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="tittle-neo" for="ktp-input">KTP</label>
                                <div class="file-loading">
                                    <input id="input-ktp" name="ktp" type="file" accept=".pdf,.png,.jpg">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="tittle-neo" for="ijazah-input">Ijazah</label>
                                <div class="file-loading">
                                    <input id="input-ijazah" name="ijazah" type="file" accept=".pdf">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="tittle-neo" for="transkip-input">Transkip Nilai</label>
                                <div class="file-loading">
                                    <input id="input-transkip" name="transkip" type="file" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-neo btn-sm" id="verify">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <script>
        jQuery(document).ready(function() {
            jQuery('#verify').click(function(e) {
                var data = new FormData(document.getElementById("formverify"));
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ route('tentor_id_verify') }}",
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function(result) {
                        if (result.errors) {
                            jQuery('#error-msg').html('');

                            jQuery.each(result.errors, function(key, value) {
                                jQuery('#error-msg').show();
                                jQuery('#error-msg').append('<li>' + value +
                                    '</li>');
                            });


                        } else {
                            $('#formmodal').hide();
                            $('.modal-backdrop').hide();
                            jQuery('.alert-danger').hide();
                            $('#open').hide();
                            var loc = window.location;
                            window.location = loc.protocol + "//" + loc.hostname + ":" + loc
                                .port + "/tentor/dashboard";
                        }
                    }

                });
            });
        });
    </script>
    <script>
        $("#input-ktp").fileinput({
            uploadUrl: "upload.php",
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: true,
            allowedFileExtensions: ['pdf', 'jpg', 'png'],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
        $("#input-ijazah").fileinput({
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: true,
            allowedFileExtensions: ["pdf"],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
        $("#input-transkip").fileinput({
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: true,
            allowedFileExtensions: ["pdf"],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
    </script>
@endsection
