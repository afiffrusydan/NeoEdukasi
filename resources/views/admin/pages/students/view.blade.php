<title>Detail Siswa {{ $data->first_name . ' ' . $data->last_name }}</title>
@extends('admin.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
        rel="stylesheet" />
    <div class="content block-rounded">
        <div class="bg-image" style="background-color: #dad5b7;">
            <div class="">
                <div class="content content-full text-center">
                    <div class="my-7">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white border-bottom shadow-sm">
            <div class="content content-boxed">
                <div class="row items-push">
                    <div class="col-3 col-md-1">
                        <img class="img-avatar" src="{{ asset('asset/images/avatars/avatar.png') }}"
                            alt="Header Avatar">
                    </div>
                    <div class="col-9 col-md-9">
                        <div class="font-size-h3 tittle-neo-header">
                            {{ $data->first_name . ' ' . $data->last_name }}
                        </div>
                        <div class="font-size-sm font-w600 text-muted text-uppercase pb-2">{{ $data->branch_name }}</div>
                        <div class="font-size-sm font-w600 text-muted text-uppercase">
                            @if ($data->status == 100)
                                <span class="btn-success btn-sm text-center">Sudah Bayar</span>
                            @elseif ($data->status == -100)
                                <span class="btn-danger btn-sm text-center">Blacklist</span>
                            @else
                                <span class="btn-info btn-sm text-center">Belum Bayar</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-2" id="div-form">
                        <div class="row items-push float-sm-right ">
                            <button type="button" class="btn btn-md btn-alt-secondary btn-block editable"
                                title="Add New Student">
                                <a href="#div-form" id="editButton" class="btn btn-sm btn-neo btn-block">Edit
                                    Profile</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded shadow-sm">
            <div class="block-content block-content-full">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="editProfile" method="POST" action="{{ route('admin.student.all.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="invisible" data-toggle="appear">
                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1 py-2">
                                    <div class="items-push float-lg-right" id="div-status">
                                        <select class="form-select form-control selectpicker" id="status" name="status"
                                            title="Status">
                                            {{-- <option value="" readonly selected>Status</option> --}}
                                            <option value="100" {{ $data->status == 100 ? 'selected' : '' }}
                                                data-content='<span class="btn-success btn-sm btn-block text-center">Sudah Bayar</span>'>
                                            </option>
                                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}
                                                data-content='<span class="btn-info btn-sm btn-block text-center">Belum Bayar</span>'>
                                            </option>
                                            <option value="-100" {{ $data->status == -100 ? 'selected' : '' }}
                                                data-content='<span class="btn-danger btn-sm btn-block text-center">Blacklist</span>'>
                                            </option>
                                        </select>
                                    </div>
                                    <label class="form-label tittle">Informasi Siswa</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Nama Depan</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Nama Depan"
                                    value="{{ $data->first_name }}" disabled required>
                            </div>
                            <input type="hidden" name="id" value="{{ $data->id }}" />
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Nama Belakang</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang"
                                    value="{{ $data->last_name }}" required disabled>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Alamat</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Alamat" required disabled
                                    rows="2">{{ $data->address }}</textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ $data->email }}" required disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Jenis Kelamin</label>
                                <select class="form-select form-control" name="gender" required disabled>
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        @if ($data->gender == 'Laki-Laki') {{ 'selected' }}@else {{ '' }} @endif>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        @if ($data->gender == 'Perempuan') {{ 'selected' }}@else {{ '' }} @endif>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Tempat Lahir</label>
                                <input type="text" name="POB" class="form-control" placeholder="Tempat Lahir"
                                    value="{{ $data->POB }}" required disabled>
                            </div>
                            <div class="col-12 col-md-6 datepick">
                                <label class="form-label tittle-neo">Tanggal Lahir</label>
                                <input class="date form-control" type="text" name="DOB" id="DOB" placeholder="YYYY-MM-DD"
                                    value="{{ $data->DOB }}" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Agama (Opsional)</label>
                                <select class="form-select form-control" name="religion" id="religion" disabled>
                                    <option value="Religion" disabled selected>Agama</option>
                                    <option value="muslim"
                                        @if ($data->religion == 'muslim') {{ 'selected' }}@else {{ '' }} @endif>
                                        Muslim </option>
                                    <option value="kristen"
                                        @if ($data->religion == 'kristen') {{ 'selected' }}@else {{ '' }} @endif>
                                        Kristen </option>
                                    <option value="katolik"
                                        @if ($data->religion == 'katolik') {{ 'selected' }}@else {{ '' }} @endif>
                                        Katolik </option>
                                    <option value="hindu"
                                        @if ($data->religion == 'hindu') {{ 'selected' }}@else {{ '' }} @endif>
                                        Hindu </option>
                                    <option value="buddha"
                                        @if ($data->religion == 'buddha') {{ 'selected' }}@else {{ '' }} @endif>
                                        Buddha </option>
                                    <option value="konghucu"
                                        @if ($data->religion == 'konghucu') {{ 'selected' }}@else {{ '' }} @endif>
                                        Konghucu </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="invisible" data-toggle="appear">
                        <div class="row g-3 col-12-line">
                            <label class="form-label tittle">Informasi Kontak Siswa</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Nomor Telepon Siswa</label>
                                <input type="text" name="phone_number" class="form-control"
                                    placeholder="Nomor Telepon Siswa" value="{{ $data->phone_number }}" required
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Nomor Telepon Orang Tua Siswa</label>
                                <input type="text" name="parent_phone_number" class="form-control"
                                    placeholder="Nomor Telepon Orang Tua Siswa" value="{{ $data->parent_phone_number }}"
                                    required disabled>
                            </div>
                        </div>
                        <div class="row g-3 col-12-line">
                            <label class="form-label tittle">Informasi Pendidikan Siswa</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Kelas</label>
                                <select class="form-select form-control" name="class" id="class" disabled>
                                    <option value="" disabled selected>Kelas</option>
                                    @foreach ($class as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            @if ($data->class_id == $kelas->id) {{ 'selected' }}@else {{ '' }} @endif
                                            @if (old('class') == '{{ $kelas->id }}') {{ 'selected' }}@else {{ '' }} @endif>
                                            {{ $kelas->class }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Asal Sekolah</label>
                                <input type="text" name="school" class="form-control" placeholder="Asal Sekolah"
                                    value="{{ $data->school }}" required disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Kurikulum</label>
                                <select class="form-select form-control" name="curriculum" id="curriculum" disabled>
                                    <option value="branch" disabled selected>Kurikulum</option>
                                    <option value="Nasional"
                                        @if ($data->curriculum == 'Nasional') {{ 'selected' }}@else {{ '' }} @endif>
                                        Nasional </option>
                                    <option value="Nasional+"
                                        @if ($data->curriculum == 'Nasional+') {{ 'selected' }}@else {{ '' }} @endif>
                                        Nasional+ </option>
                                    <option value="Internasional"
                                        @if ($data->curriculum == 'Internasional') {{ 'selected' }}@else {{ '' }} @endif>
                                        Internasional </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label tittle-neo">Cabang</label>
                                <select class="form-select form-control" name="branch" id="branch" disabled>
                                    <option value="branch" disabled selected>Cabang</option>
                                    @foreach ($branchs as $branch)
                                        <option value="{{ $branch->branch_id }}"
                                            @if ($data->branch_id == $branch->branch_id) {{ 'selected' }}@else {{ '' }} @endif>
                                            {{ $branch->branch_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="invisible pt-4 mt-4" id="saveChanges" data-toggle="appear" style="display: none">
                        <div class="block-content block-content-full">
                            <div class="mb-2 col-12 text-center">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 col-md-2 mb-3">
                                        <button type="button" id="removeButton" class="btn btn-sm btn-danger btn-block">
                                            Hapus Data
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <button type="submit" name="submit" class="btn btn-sm btn-neo btn-block">
                                            Simpan
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-1">
                                        <a href="#" id="cancelButton" class="btn btn-sm btn-secondary">Batal</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#status').on('change', function() {
            if (!$("#editProfile input,textarea,select").is(':disabled')) {
                var selected = $(this).val();
                if (selected == 100) {
                    var selectedName = "Sudah Bayar";
                    var buttonColor = "#5cb85c";
                } else if (selected == 0) {
                    var selectedName = "Belum Bayar";
                    var buttonColor = "#70b9eb";
                } else {
                    var selectedName = "Blacklist";
                    var buttonColor = "#dc3545";
                }
                Swal.fire({
                    title: 'Student Status',
                    text: "Are You Sure update status to " + selectedName + "?",
                    icon: 'info',
                    showCloseButton: true,
                    showCancelButton: true,
                    allowOutsideClick: false,
                    confirmButtonText: 'Update',
                    confirmButtonColor: buttonColor
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: "",
                            text: "Please wait",
                            imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            url: "{{ route('admin.student.all.update_status') }}",
                            method: "POST",
                            data: {
                                id: "{{ $data->id }}",
                                status: selected,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Update Status :',
                                    text: data,
                                    icon: 'success',
                                    showConfirmButton: false,
                                });
                                setTimeout(function() {
                                    document.location.reload()
                                }, 1000);
                            },
                            error: function(error) {
                                Swal.fire({
                                    title: 'Update Status :',
                                    text: error,
                                    icon: 'error',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                setTimeout(function() {
                                    window.location.href = (
                                        "{{ route('admin.submission.salary-submission.detail', ['id' => $data->id]) }}"
                                    );
                                }, 1000);
                            }
                        });
                    }
                });
            }
        });
    </script>
    <script>
        var elem = document.getElementById('saveChanges');
        $("a#editButton").click(function(event) {
            if ($("#editProfile input,textarea,select").is(':disabled')) {
                $("#editProfile input,textarea,select").prop("disabled", false);
                $("#DOB").prop("readonly", true);
                elem.style.display = 'block';
            } else {
                $("#editProfile input,textarea,select").prop("disabled", true);
                elem.style.display = 'none';
            }
        });

        $("a#cancelButton").click(function(event) {
            $("#editProfile :input,textarea,select").prop("disabled", true);
            elem.style.display = 'none';
        });
    </script>

    <script>
        $("#removeButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "You will not be able to recover this record!",
                icon: 'info',

                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it',
                confirmButtonColor: "#d26a5c"
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        text: "Please wait",
                        imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ route('admin.student.all.delete') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Delete Status :',
                                text: data,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function() {
                                window.location.replace(
                                    "{{ route('admin.student.all.all') }}");
                            }, 3000);
                        },
                        error: function(error) {
                            Swal.fire({
                                title: 'Update Status :',
                                text: error,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function() {
                                window.location.href = (
                                    "{{ route('admin.submission.salary-submission.detail', ['id' => $data->id]) }}"
                                );
                            }, 1000);
                        }
                    });
                }
            });
        });
    </script>
    <!-- END Page Content -->
@endsection
