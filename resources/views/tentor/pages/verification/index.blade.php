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
                                        <h3 class="block-title text-center">Standar Operasional Prosedur</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content fs-sm">
                                        <div class="row g-3">
                                            {{-- <div class="col-12 col-md-12">
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
                                            </div> --}}
                                            <div class="col-12 col-md-12 pb-2">
                                                <p class="text-justify">
                                                    &emsp; Selamat datang rekan tentor Neo Edukasi. Berikut adalah mekanisme
                                                    les privat yang harus dipatuhi oleh tentor. Harap dibaca dengan saksama
                                                    dan dipahami sepenuhnya. Dokumen ini bisa disebut juga sebagai
                                                    “Perjanjian” dimana tentor harus bertanggungjawab penuh dengan apa yang
                                                    sudah disetujui. Dengan klik tombol setuju di akhir, maka dianggap
                                                    sebagai bentuk penerimaan atas semua ketentuan Neo Edukasi.
                                                </p>
                                            </div>
                                            <div class="pl-1">

                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default1" name="example-checkbox-default1">
                                                        <label class="text-justify pl-2" for="example-checkbox-default1">Les
                                                            dilaksanakan sesuai dengan kontrak awal yang dijelaskan oleh
                                                            Akademik. Jika ada perubahan jadwal dan biodata siswa bisa
                                                            konfirmasi kepada Akademik.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default2" name="example-checkbox-default2">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default2">Tentor diwajibkan untuk
                                                            professional, jujur, memiliki attitude yang baik, sopan dalam
                                                            berinteraksi, disiplin, serta dapat menjaga nama baik pribadi
                                                            dan Neo Edukasi.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default3" name="example-checkbox-default3">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default3">Setiap pertemuan les diwajibkan
                                                            membawa dan mengisi presensi resmi terbaru dari Neo Edukasi yang
                                                            diprint untuk satu dibawa siswa dan satu dibawa tentor. Presensi
                                                            diisi hanya saat ada pertemuan dan wajib ditandatangani oleh
                                                            wali siswa.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default4" name="example-checkbox-default4">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default4">Pertemuan les dilaksanakan
                                                            dengan durasi 90 menit. Jika pertemuan kurang dari 90 menit
                                                            mohon konfirmasi kepada Akademik dan diberikan keterangan dalam
                                                            lembar presensi. Jika kurang dari durasi tersebut maka tidak
                                                            dihitung penuh.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default5" name="example-checkbox-default5">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default5">Tentor diperbolehkan membawa
                                                            print / fotocopy atau buku ajar tambahan dengan beban biaya
                                                            ditanggung oleh siswa. Dengan catatan harus konfirmasi dahulu
                                                            kepada wali siswa, jika tidak ada keterangan dan nota resmi maka
                                                            kami tidak bertanggungjawab atas biaya tersebut.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default6" name="example-checkbox-default6">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default6">Tentor diwajibkan mengisi
                                                            laporan perkembangan bulanan siswa. Laporan dikirimkan dalam
                                                            bentuk softfile kepada wali/siswa setiap akhir bulan.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default7" name="example-checkbox-default7">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default7">Tentor rutin mengkonfirmasi
                                                            ulang pertemuan les dengan siswa agar tidak terjadi pembatalan
                                                            les ataupun tentor menunggu siswa bersiap.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default8" name="example-checkbox-default8">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default8">Ketika tentor sudah mendapatkan
                                                            siswa, tentor tidak dapat membatalkan secara sepihak tanpa ada
                                                            konfirmasi dari wali siswa ataupun Akademik.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default9" name="example-checkbox-default9">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default9">Tentor dilarang membahas tentang
                                                            pembayaran atau meminta gaji langsung kepada wali siswa untuk
                                                            menghindari ketidaknyamanan karena termasuk sikap yang tidak
                                                            sopan dan bukan wewenang tentor. Gaji hanya boleh diajukan
                                                            kepada pihak Neo Edukasi.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default10"
                                                            name="example-checkbox-default10">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default10">Tentor siap menerima masukan
                                                            jika ada keluhan dan siap diganti jika siswa mengajukan
                                                            pergantian tentor.</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input px-2" type="checkbox" value=""
                                                            id="example-checkbox-default11"
                                                            name="example-checkbox-default11">
                                                        <label class="text-justify pl-2"
                                                            for="example-checkbox-default11">Apabila diketahui adanya
                                                            pelanggaran SOP, maka Neo Edukasi berhak untuk memeberikan surat
                                                            peringatan, sanksi, atau pemutusan relasi.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-end bg-body text-right">
                                        <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" id="submit-verification" class="btn btn-sm btn-primary"
                                            data-bs-dismiss="modal">Saya Mengerti, dan Setuju </button>
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
            // if (document.getElementById("input-ktp").files.length != 0) {
            //     var ktp = $("#input-ktp")[0].files[0]
            //     document.getElementById("modal-KTP").value = ktp.name;
            // }
            // if (document.getElementById("input-ijazah").files.length != 0) {
            //     var ijazah = $("#input-ijazah")[0].files[0]
            //     document.getElementById("modal-ijazah").value = ijazah.name;
            // }
            // if (document.getElementById("input-transkip").files.length != 0) {
            //     var transkip = $("#input-transkip")[0].files[0]
            //     document.getElementById("modal-transkip").value = transkip.name;
            // }
            // var transkip = $("#input-transkip")[0].files[0]
            // document.getElementById("modal-NIK").value = $("#NIK").val();
            $("#modal-review").modal('show');
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            document.getElementById("submit-verification").disabled = true;
            $('#formverify input:checkbox').change(function() {
                if ($('#formverify input:checkbox:checked').length === 11) {
                    document.getElementById("submit-verification").disabled = false;
                } else {
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
                $.ajax({
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
                    },
                    error: function(data) {
                        console.log(data);
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
