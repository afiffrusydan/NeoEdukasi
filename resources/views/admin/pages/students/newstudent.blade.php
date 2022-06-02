@extends('admin.layouts.app')
<title>Tambah Daftar Siswa</title>
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light border-right-neo">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                       Tambah Siswa<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.student.all.all') }}">Daftar Siswa</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx">Tambah Siswa</a>
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
                    <form method="POST" action="{{ route('admin.student.all.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                            <div class="row g-3 col-12-line1">
                                <label class="form-label tittle">Informasi Siswa</label>
                            </div>
                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Nama Depan </label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Nama Depan"
                                        value="{{ old('first_name') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Nama Belakang </label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang"
                                        value="{{ old('last_name') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Alamat</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Alamat"
                                        required autofocus rows="2">{{ old('address') }}</textarea>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Jenis Kelamin</label>
                                    <select class="form-select form-control" name="gender" required>
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="Laki-Laki" @if (old('gender') == 'Laki-Laki') {{ 'selected' }}@else {{ '' }} @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if (old('gender') == 'Perempuan') {{ 'selected' }}@else {{ '' }} @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Tempat Lahir</label>
                                    <input type="text" name="POB" class="form-control" placeholder="Tempat Lahir"
                                        value="{{ old('POB') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6 datepick">
                                    <label class="form-label tittle-neo">Tanggal Lahir</label>
                                    <input class="date form-control" type="text" name="DOB" id="DOB"
                                        placeholder="YYYY-MM-DD" value="{{ old('DOB') }}" readonly>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Agama (Optional)</label>
                                    <select class="form-select form-control" name="religion" id="religion">
                                        <option value="Religion" disabled selected>Agama</option>
                                        <option value="muslim"
                                            @if (old('religion') == 'muslim') {{ 'selected' }}@else {{ '' }} @endif>
                                            Muslim </option>
                                        <option value="kristen"
                                            @if (old('religion') == 'kristen') {{ 'selected' }}@else {{ '' }} @endif>
                                            Kristen </option>
                                        <option value="katolik"
                                            @if (old('religion') == 'katolik') {{ 'selected' }}@else {{ '' }} @endif>
                                            Katolik </option>
                                        <option value="hindu"
                                            @if (old('religion') == 'hindu') {{ 'selected' }}@else {{ '' }} @endif>
                                            Hindu </option>
                                        <option value="buddha"
                                            @if (old('religion') == 'buddha') {{ 'selected' }}@else {{ '' }} @endif>
                                            Buddha </option>
                                        <option value="konghucu"
                                            @if (old('religion') == 'konghucu') {{ 'selected' }}@else {{ '' }} @endif>
                                            Konghucu </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 col-12-line">
                                <label class="form-label tittle">Informasi Kontak Siswa</label>
                            </div>

                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Nomor Telepon Siswa</label>
                                    <input type="text" maxlength="13" onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="phone_number" class="form-control" placeholder="Nomor Telepon Siswa"
                                        value="{{ old('phone_number') }}"  required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Nomor Telepon Orang Tua Siswa</label>
                                    <input type="text" maxlength="13" onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="parent_phone_number" class="form-control"
                                        placeholder="Nomor Telepon Orang Tua Siswa"  value="{{ old('parent_phone_number') }}"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="row g-3 col-12-line">
                                <label class="form-label tittle">Informasi Pendidikan Siswa</label>
                            </div>

                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Kelas</label>
                                    <select class="form-select form-control" name="class" id="class">
                                        <option value="" disabled selected>Kelas</option>
                                        @foreach ($class as $class)
                                        <option value="{{ $class->id }}"
                                                @if (old('class') == '{{ $class->id }}') {{ 'selected' }}@else {{ '' }} @endif>
                                                {{ $class->class}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Asal Sekolah</label>
                                    <input type="text" name="school" class="form-control" placeholder="School"
                                        value="{{ old('school') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Kurikulum</label>
                                    <select class="form-select form-control" name="curriculum" id="curriculum">
                                        <option value="branch" disabled selected>Kurikulum</option>
                                        <option value="Nasional"
                                            @if (old('curriculum') == 'Nasional') {{ 'selected' }}@else {{ '' }} @endif>
                                            Nasional </option>
                                        <option value="Nasional+"
                                            @if (old('curriculum') == 'Nasional+') {{ 'selected' }}@else {{ '' }} @endif>
                                            Nasional+ </option>
                                        <option value="International"
                                            @if (old('curriculum') == 'International') {{ 'selected' }}@else {{ '' }} @endif>
                                            International </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Cabang</label>
                                    <select class="form-select form-control" name="branch" id="branch">
                                        <option value="" disabled selected>Cabang</option>
                                        @foreach ($branchs as $branch)
                                            <option value="{{ $branch->branch_id }}"
                                                @if (old('branch') == '{{ $branch->branch_id }}') {{ 'selected' }}@else {{ '' }} @endif>
                                                {{ $branch->branch_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 col-12 d-flex justify-content-center mt-200" style="margin-top: 5%">
                                <button class="btn btn-sm btn-neo" name="submit" type="submit">
                                    Simpan
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
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
