<title>Halaman Verifikasi Akun</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block shadow-sm">
            <div class="bg-white">
                <div class="content content-full bg-header-tentor"
                    style="
                                                        background-image:url({{ asset('images/Asset/header-tentors-big.png') }});">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h1 class="h3 fw-bold mb-2">
                                Form Verifikasi
                            </h1>
                        </div>
                        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a class="link-fx" href="{{ route('tentor.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Form Verifikasi
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
                <form enctype="multipart/form-data" method="post" action="{{ route('tentor_id_verify') }}"
                    id="formverify">
                    @csrf

                    <div class="modal-header">
                        <h4 class="modal-title neo">Form Verifikasi Akun</h4>
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
                                <input id="input-ktp" name="ktp" type="file" accept=".pdf,.png,.jpg" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="tittle-neo" for="ijazah-input">Ijazah</label>
                            <div class="file-loading">
                                <input id="input-ijazah" name="ijazah" type="file" accept=".pdf" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="tittle-neo" for="transkip-input">Transkip Nilai</label>
                            <div class="file-loading">
                                <input id="input-transkip" name="transkip" type="file" accept=".pdf" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <button type="button" class="btn btn-neo btn-sm" id="verify">Simpan</button>
                    </div>
                    <div class="modal hide" id="modal-review" tabindex="-1" aria-labelledby="modal-block-vcenter"
                        style="display: hidden;" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="block block-rounded block-transparent mb-0">
                                    <div class="block-header block-header-default">
                                        <h3 class="block-title">Detail Verifikasi Akun</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content fs-sm">
                                        <div class="row g-3">
                                            <div class="col-12 col-md-12">
                                                <label class="form-label tittle-neo">NIK</label>
                                                <input type="text" class="form-control form-control" id="modal-NIK"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label class="form-label tittle-neo">KTP</label>
                                                <input type="text" class="form-control form-control" id="modal-KTP"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label class="form-label tittle-neo">Ijazah</label>
                                                <input type="text" class="form-control form-control" id="modal-ijazah"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label class="form-label tittle-neo">Transkip Nilai</label>
                                                <input type="text" class="form-control form-control" id="modal-transkip"
                                                    disabled>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-check py-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="example-checkbox-default1" name="example-checkbox-default1">
                                                    <label class="tittle-check" for="example-checkbox-default1">Option
                                                        1</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-check py-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="example-checkbox-default2" name="example-checkbox-default2">
                                                    <label class="tittle-check" for="example-checkbox-default2">Option
                                                        2</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-check py-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="example-checkbox-default3" name="example-checkbox-default3">
                                                    <label class="tittle-check" for="example-checkbox-default3">Option
                                                        3</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-end bg-body text-right">
                                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" id="submit-verification" class="btn btn-sm btn-primary"
                                            data-bs-dismiss="modal">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    <script></script>
    <script>
        $("#verify").click(function(event) {
            event.preventDefault();
            if (document.getElementById("input-ktp").files.length != 0) {
                var ktp = $("#input-ktp")[0].files[0]
                document.getElementById("modal-KTP").value = ktp.name;
            }
            if (document.getElementById("input-ijazah").files.length != 0) {
                var ijazah = $("#input-ijazah")[0].files[0]
                document.getElementById("modal-ijazah").value = ijazah.name;
            }
            if (document.getElementById("input-transkip").files.length != 0) {
                var transkip = $("#input-transkip")[0].files[0]
                document.getElementById("modal-transkip").value = transkip.name;
            }
            var transkip = $("#input-transkip")[0].files[0]
            document.getElementById("modal-NIK").value = $("#NIK").val();
            $("#modal-review").modal('show');
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            document.getElementById("submit-verification").disabled = true;
            $('#formverify input:checkbox').change(function() {
                if($('#formverify input:checkbox:checked').length === 3){
                    document.getElementById("submit-verification").disabled = false;
                }else{
                    document.getElementById("submit-verification").disabled = true;
                }
            });
            jQuery('#submit-verification').click(function(e) {
                e.preventDefault();
                var data = new FormData(document.getElementById("formverify"));
                Swal.fire({
                    title: "",
                    text: "Please wait...",
                    imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
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
                            $('html,body').scrollTop(0);
                            jQuery('#error-msg').html('');

                            jQuery.each(result.errors, function(key, value) {
                                jQuery('#error-msg').show();
                                jQuery('#error-msg').append('<li>' + value +
                                    '</li>');
                            });
                            $('html,body').scrollTop(0);
                            swal.close()

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
