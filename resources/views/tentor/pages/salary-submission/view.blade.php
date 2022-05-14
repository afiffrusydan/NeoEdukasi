<title>Update Pengajuan Gaji</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Update Submission<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('tentor.salary-submission.index')}}">Salary Sumbission</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Update Sumbission</a>
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
                    <form method="POST" action="{{ route('tentor.salary-submission.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                            <div class="row g-3 col-12-line1">
                                <label class="form-label tittle">Student Progress Report</label>
                            </div>
                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Student Name</label>
                                    <select class="form-control selectpicker" id="studentId" name="id" disabled required>
                                        <option value="{{ $data->id }}" selected>
                                            {{ $data->stdFirstName.' '.$data->stdLastName.' ( '.$data->subject.' )' }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Month</label>
                                    <select class="form-control selectpicker" id="monthSelect" name="month" disabled required>
                                        <option value="{{ $data->month }}" selected>
                                            {{ date('F Y', strtotime($data->month)) }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Jumlah Jam Pertemuan</label>
                                            <input type="number" class="form-control form-control-alt" name="meet_hours"
                                                id="meet_hours" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                placeholder="Jumlah Pertemuan" value="{{ $data->meet_hours }}">
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Tambahan Pertemuan  (Menit)</label>
                                    <div class="row">
                                        <div class="col-8 col-md-10">
                                            <input type="number" class="form-control form-control-alt"
                                                name="extra_meet_hours" id="extra_meet_hours"
                                                onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                placeholder="Jumlah Pertemuan (Menit)" value="{{ $data->extra_meet_hours }}">
                                        </div>
                                        <div class="col-4 col-md-2">
                                            <button type="button" id="extra" class="btn btn-light btn-block" disabled>
                                                &nbsp
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Documentation (Optional)</label>
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
                                    <label class="form-label tittle-neo">Aditional Cost</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" class="form-control form-control-alt" name="add_cost"
                                            id="add_cost"
                                            placeholder="Additional Cost" value="{{ $data->add_cost }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Proof</label>
                                    <div class="file-loading">
                                        <input id="proof" name="proof" type="file" accept=".png,.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 col-12 d-flex justify-content-center mt-200" style="margin-top: 5%">
                                <button class="btn btn-neo" name="submit" type="submit">
                                    Save Changes
                                </button>
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
            if(rupiah.value == ""){
                $('#proof').prop('required',false);
            }else{
                $('#proof').prop('required',true);
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
        var textInput = document.getElementById("extra_meet_hours").value;
        var sum = textInput / 30;
        document.getElementById("extra").innerHTML = parseInt(sum);
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
@endsection
