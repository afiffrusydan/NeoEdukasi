@extends('admin.layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
                        <img class="img-avatar" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar">
                    </div>
                    <div class="col-9 col-md-9">
                        <div class="font-size-h3 tittle-neo-header">
                            {{ $data->first_name . ' ' . $data->last_name }}
                        </div>
                        <div class="font-size-sm font-w600 text-muted text-uppercase">{{ $data->branch_name }}</div>
                    </div>
                    <div class="col-12 col-md-2" id="div-form">
                        <div class="row items-push float-sm-right ">
                            <button type="button" class="btn btn-md btn-alt-secondary btn-block editable"
                                title="Add New Student">
                                <a href="#div-form" id="editButton" class="btn btn-sm btn-neo pull-right btn-block">Edit
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
                <div class="col-md-12 col-xl-12">
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
                        <form id="editProfile" method="POST" action="{{ route('admin.student.all.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="invisible" data-toggle="appear">
                                <div class="row g-3 col-12-line1">
                                    <label class="form-label tittle">Personal Information</label>
                                </div>
                                <div class="row g-3 col-12">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                            value="{{ $data->first_name }}" disabled required>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $data->id }}" />
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                            value="{{ $data->last_name }}" required disabled>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label tittle-neo">Address</label>
                                        <textarea id="address" name="address" class="form-control" placeholder="Address"
                                            required disabled rows="2">{{ $data->address }}</textarea>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ $data->email }}" required disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Gender</label>
                                        <select class="form-select form-control" name="gender" required disabled>
                                            <option selected disabled>Gender</option>
                                            <option value="Male"
                                                @if ($data->gender == 'Male') {{ 'selected' }}@else {{ '' }} @endif>
                                                Male</option>
                                            <option value="Female"
                                                @if ($data->gender == 'Female') {{ 'selected' }}@else {{ '' }} @endif>
                                                Female</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Place Of Birth</label>
                                        <input type="text" name="POB" class="form-control" placeholder="Place Of Birth"
                                            value="{{ $data->POB }}" required disabled>
                                    </div>
                                    <div class="col-12 col-md-6 datepick">
                                        <label class="form-label tittle-neo">Date Of Birth</label>
                                        <input class="date form-control" type="text" name="DOB" id="DOB"
                                            placeholder="YYYY-MM-DD" value="{{ $data->DOB }}" disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Religion (Optional)</label>
                                        <select class="form-select form-control" name="religion" id="religion" disabled>
                                            <option value="Religion" disabled selected>Religion</option>
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
                                    <label class="form-label tittle">Contact Information</label>
                                </div>
                                <div class="row g-3 col-12">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            placeholder="Phone Number" value="{{ $data->phone_number }}" required
                                            disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Parent Phone Number</label>
                                        <input type="text" name="parent_phone_number" class="form-control"
                                            placeholder="Parent Phone Number" value="{{ $data->parent_phone_number }}"
                                            required disabled>
                                    </div>
                                </div>
                                <div class="row g-3 col-12-line">
                                    <label class="form-label tittle">Education Information</label>
                                </div>
                                <div class="row g-3 col-12">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Class</label>
                                        <input type="text" name="class" class="form-control" placeholder="Class"
                                            value="{{ $data->class }}" required disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">School</label>
                                        <input type="text" name="school" class="form-control" placeholder="School"
                                            value="{{ $data->school }}" required disabled>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label tittle-neo">Curriculum</label>
                                        <select class="form-select form-control" name="curriculum" id="curriculum" disabled>
                                            <option value="branch" disabled selected>Curriculum</option>
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
                                        <label class="form-label tittle-neo">Branch</label>
                                        <select class="form-select form-control" name="branch" id="branch" disabled>
                                            <option value="branch" disabled selected>Branch</option>
                                            @foreach ($branchs as $branch)
                                                <option value="{{ $branch->branch_id }}"
                                                    @if ($data->branch_id == $branch->branch_id) {{ 'selected' }}@else {{ '' }} @endif>
                                                    {{ $branch->branch_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="invisible" id="saveChanges" data-toggle="appear" style="display: none">
                                <div class="block-content block-content-full">
                                    <div class="mb-4 col-12 text-center">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 col-md-2 mb-3">
                                                <button type="button" id="removeButton"
                                                    class="btn btn-sm btn-danger btn-block">
                                                    Delete Record
                                                </button>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <button type="submit" name="submit" class="btn btn-sm btn-neo btn-block">
                                                    Save Changes
                                                </button>
                                            </div>
                                            <div class="col-12 col-sm-1">
                                                <a href="#" id="cancelButton" class="btn btn-sm btn-secondary">Cancel</a>
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
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
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
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
    <!-- END Page Content -->
@endsection
