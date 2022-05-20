<title>Form Pengajuan Gaji</title>
@extends('admin.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />

@section('content')
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full border-right-neo">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Form Pengajuan Gaji<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="">Pengajuan Gaji</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tambah</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-0">
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
                    <form method="POST" action="{{ route('tentor.salary-submission.submit') }}"
                        enctype="multipart/form-data" id="submitForm">
                        @csrf
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                            <div class="row g-3 col-12-line1">
                                <label class="form-label tittle">Form Pengajuan Gaji</label>
                            </div>
                            <div class="row g-3 col-12">

                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Tentor Name</label>
                                    <select class="form-control selectpicker" id="tentorId" name="tentor_id"
                                        data-live-search="true" data-size="4">
                                        <option value="0" selected disabled>
                                            Please Select
                                        </option>
                                        @foreach ($tentorList as $tentor)
                                            <option value="{{ $tentor->id }}">
                                                {{ $tentor->first_name . ' ' . $tentor->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Nama Siswa ( Mata Pelajaran )</label>
                                    <select class="form-control" id="studentId" name="tentored_id"
                                        data-live-search="true" data-size="4" required disabled>
                                        <option value="0" selected disabled>
                                            Silahkan Pilih
                                        </option>
                                        {{-- @foreach ($students as $student)
                                            <option value="{{ $student->stdId }}">
                                                {{ $student->first_name . ' ' . $student->last_name . '  ( ' . $student->subject . ' )' }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Bulan</label>
                                    <select class="form-control" id="monthSelect" name="month" disabled
                                        required>
                                        <option value="0" selected disabled>
                                            Silahkan Pilih
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Jumlah Jam Pertemuan</label>
                                    <input type="number" class="form-control" name="meet_hours" id="meet_hours"
                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')" placeholder="Jumlah Pertemuan">
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Tambahan Pertemuan ( Menit )</label>
                                    <div class="row">
                                        <div class="col-8 col-md-10">
                                            <input type="number" class="form-control " name="extra_meet_hours"
                                                id="extra_meet_hours" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                placeholder="Jumlah Pertemuan (Menit)">
                                        </div>
                                        <div class="col-4 col-md-2">
                                            <button type="button" id="extra" class="btn btn-light btn-block" disabled>
                                                &nbsp
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Dokumentasi ( Opsional )</label>
                                    <div class="file-loading">
                                        <input id="documentation" name="documentation" type="file" accept=".png,.jpg">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Presensi</label>
                                    <div class="file-loading">
                                        <input id="attendance" name="attendance" type="file" accept=".png,.jpg" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Tambahan Biaya</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control" name="add_cost" id="add_cost"
                                            placeholder="Additional Cost">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Bukti Tambahan Biaya</label>
                                    <div class="file-loading">
                                        <input id="proof" name="proof" type="file" accept=".png,.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 col-12 d-flex justify-content-center mt-200" style="margin-top: 5%">
                                <button type="button" name="check" class="btn btn-sm btn-neo push" id="check">
                                    Simpan
                                </button>
                            </div>
                            <div class="modal hide" id="modal-review" tabindex="-1"
                                aria-labelledby="modal-block-vcenter" style="display: hidden;" aria-modal="true"
                                role="dialog">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="block block-rounded block-transparent mb-0">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">Detail Pengajuan Gaji</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content fs-sm">
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Gaji Pertemuan</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-meet_hours" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Gaji Waktu Tambahan</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-extra_meet_hours" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Dokumentasi</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-documentation" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Presensi</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-attendance" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Tambahan Biaya</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-add_cost" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label tittle-neo">Bukti Tambahan Biaya</label>
                                                        <input type="text" class="form-control form-control"
                                                            id="modal-proof" disabled>
                                                    </div>
                                                    <div class="col-12 col-md-12 py-2">
                                                        <label class="form-label tittle-neo">Total</label>
                                                        <input type="text" class="form-control" id="modal-total"
                                                            name="total_salary" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block-content block-content-full text-end bg-body">
                                                <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-bs-dismiss="modal">Submit</button>
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
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
    <script>
        var rupiah = document.getElementById("add_cost");
        rupiah.addEventListener("input", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
            if (rupiah.value == "" || rupiah.value == "0") {
                $('#proof').prop('required', false);
            } else {
                $('#proof').prop('required', true);
            }
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? rupiah : "";
        }

        $('#extra_meet_hours').on('input', function() {
            var textInput = document.getElementById("extra_meet_hours").value;
            var button = document.getElementById("extra");
            if (textInput == "") {
                button.innerHTML = "&nbsp"
            } else {
                var sum = textInput / 30;
                button.innerHTML = parseInt(sum);
            }
        });

        $("#documentation").fileinput({
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: false,
            allowedFileExtensions: ['jpg', 'png'],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
        $("#attendance").fileinput({
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: false,
            allowedFileExtensions: ['jpg', 'png'],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
        $("#proof").fileinput({
            showClose: false,
            showUpload: false,
            showUploadedThumbs: false,
            showPreview: false,
            allowedFileExtensions: ['jpg', 'png'],
            'layoutTemplates': {
                'footer': '<div class="file-thumbnail-footer">\n' +
                    '    <div class="file-footer-caption">{size}</div>\n' +
                    '    {progress} \n' +
                    '</div>'
            }
        });
    </script>
    <script>
        $('#tentorId').on('change', function() {
            var selected = $(this).val();
            $("#studentId").prop("disabled", false);
            $("#studentId").empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih</option>");
            $("#monthSelect").prop("disabled", true);
            $("#monthSelect").empty().append(
                "<option disabled='disabled' SELECTED>Silahkan Pilih</option>");

            Swal.fire({
                title: "",
                text: "Please wait...",
                imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            $.ajax({
                url: "{{ route('admin.submission.salary-submission.get-student') }}",
                type: "POST",
                data: {
                    id: selected,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let optionList = document.getElementById('studentId').options;
                    if (response.length != 0) {
                        $("#studentId").prop("disabled", false);
                        $("#montstudentIdhSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Silahkan Pilih</option>");

                        response.forEach(response =>
                            optionList.add(
                                new Option(response.text, response.id)
                            )
                        );
                        swal.close()
                    } else {
                        $("#studentId").prop("disabled", true);
                        $("#studentId").empty().append(
                            "<option disabled='disabled' SELECTED>No Data Found</option>");
                    }
                    swal.close()
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $('#studentId').on('change', function() {
            var selected = $(this).val();
            Swal.fire({
                title: "",
                text: "Please wait...",
                imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            $.ajax({
                url: "{{ route('admin.submission.salary-submission.get-month') }}",
                type: "POST",
                data: {
                    id: selected,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let optionList = document.getElementById('monthSelect').options;
                    if (response.length != 0) {
                        $("#monthSelect").prop("disabled", false);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Silahkan Pilih</option>");

                        response.forEach(response =>
                            optionList.add(
                                new Option(response.text, response.id)
                            )
                        );
                        swal.close()
                    } else {
                        $("#monthSelect").prop("disabled", true);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>No Data Found</option>");
                    }
                    swal.close()
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
    <script>
        $("#check").click(function(event) {
            event.preventDefault();
            var isvalidate = $("#submitForm")[0].checkValidity();
            if (isvalidate) {
                event.preventDefault();
                let id = $("#studentId").val();
                let meet_hours = $("#meet_hours").val();
                let extra_meet_hours = $("#extra_meet_hours").val();
                let add_cost = $("#add_cost").val();
                $.ajax({
                    url: "{{ route('tentor.salary-submission.check') }}",
                    type: "POST",
                    data: {
                        id: id,
                        meet_hours: meet_hours,
                        extra_meet_hours: extra_meet_hours,
                        add_cost: add_cost,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var reverse = response.total.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                        ribuan = ribuan.join('.').split('').reverse().join('');
                        var fileInput = '';
                        var fileInput2 = '';
                        document.getElementById("modal-total").value = 'Rp. ' + ribuan;
                        if ($('#documentation').get(0).files.length !== 0) {
                            fileInput = document.getElementById('documentation').files[0].name;
                        }
                        if ($('#proof').get(0).files.length !== 0) {
                            fileInput2 = document.getElementById('proof').files[0].name;
                        }
                        var fileInput1 = document.getElementById('attendance').files[0].name;
                        document.getElementById("modal-meet_hours").value = meet_hours + ' x ' +
                            response.price + ' = ' + (meet_hours * response.price);
                        document.getElementById("modal-add_cost").value = document.getElementById(
                            'add_cost').value;
                        document.getElementById("modal-extra_meet_hours").value = parseInt(
                            extra_meet_hours / 30) + ' x ' + response.add_price + ' = ' + (parseInt(
                            extra_meet_hours / 30) * response.add_price);
                        document.getElementById("modal-documentation").value = fileInput;
                        document.getElementById("modal-attendance").value = fileInput1;
                        document.getElementById("modal-proof").value = fileInput2;
                        $("#modal-review").modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        });
    </script>
@endsection
