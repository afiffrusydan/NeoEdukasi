@extends('admin.layouts.app')

@section('content')
    <!-- Hero -->
    <title>Laravel Bootstrap Datepicker</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Add New Student<small
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
                                <a class="link-fx" href="">Add new student</a>
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
                                <label class="form-label tittle">Personal Information</label>
                            </div>
                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                        value="{{ old('first_name') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                        value="{{ old('last_name') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label tittle-neo">Address</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Address"
                                        required autofocus rows="2">{{ old('address') }}</textarea>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Gender</label>
                                    <select class="form-select form-control" name="gender" required>
                                        <option selected disabled>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Place Of Birth</label>
                                    <input type="text" name="POB" class="form-control" placeholder="Place Of Birth"
                                        value="{{ old('POB') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6 datepick">
                                    <label class="form-label tittle-neo">Date Of Birth</label>
                                    <input class="date form-control" type="text" name="DOB" id="DOB"
                                        placeholder="YYYY-MM-DD" value="{{ old('DOB') }}" readonly>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Religion (Optional)</label>
                                    <select class="form-select form-control" name="religion" id="religion">
                                        <option value="Religion" disabled selected>Religion</option>
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
                                <label class="form-label tittle">Contact Information</label>
                            </div>

                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number"
                                        value="{{ old('phone_number') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Parent Phone Number</label>
                                    <input type="text" name="parent_phone_number" class="form-control"
                                        placeholder="Parent Phone Number" value="{{ old('pasent_phone_number') }}"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="row g-3 col-12-line">
                                <label class="form-label tittle">Education Information</label>
                            </div>

                            <div class="row g-3 col-12">
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Class</label>
                                    <input type="text" name="class" class="form-control" placeholder="Class"
                                        value="{{ old('class') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">School</label>
                                    <input type="text" name="school" class="form-control" placeholder="School"
                                        value="{{ old('school') }}" required autofocus>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label tittle-neo">Curriculum</label>
                                    <select class="form-select form-control" name="curriculum" id="curriculum">
                                        <option value="branch" disabled selected>Curriculum</option>
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
                                    <label class="form-label tittle-neo">Branch</label>
                                    <select class="form-select form-control" name="branch" id="branch">
                                        <option value="branch" disabled selected>Branch</option>
                                        @foreach ($branchs as $branch)
                                            <option value="{{ $branch->branch_id }}"
                                                @if (old('branch') == '{{ $branch->branch_id }}') {{ 'selected' }}@else {{ '' }} @endif>
                                                {{ $branch->branch_name }} </option>
                                        @endforeach
                                    </select>
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
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
