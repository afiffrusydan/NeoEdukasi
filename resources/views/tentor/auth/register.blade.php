<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tentor Account Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/opensans-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!---*** End: JQuery 3.3.1 version. ***--->
    <!---*** Start: Bootstrap 3.3.7 version files. ***--->
    <script language="javascript" src="{{ asset('js/bootstrap-3.3.7.min.js') }}"></script>
    <script language="javascript" src="{{ asset('js/moment.js') }}"></script>
    <script language="javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap_datepicker.css') }}" />

    <!-- Mobile Specific Metas -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logo-ne.ico') }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Font-->


</head>

<body>
    <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                <form class="form-register" action={{ route('register.post') }} method="post">
                    <div id="form-total">
                        @csrf
                        <!-- SECTION 1 -->
                        <h2>

                            <p class="step-icon"><span>01</span></p>

                            <span class=" step-text">Account Infomation</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Tentor Account Infomation</h3>
                                    <p>Please enter your infomation and proceed to the next step so we can build your
                                        accounts. </p>
                                </div>
                                <div class="form-row">

                                    <div class="form-holder">
                                        <fieldset>
                                            <legend>First Name</legend>
                                            <input type="text" class="form-control" id="first_name"
                                                @error('first_name') is-invalid @enderror" name="first_name"
                                                value="{{ old('first_name') }}" placeholder="First Name" required>
                                        </fieldset>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-holder">
                                        <fieldset>
                                            <legend>Last Name</legend>
                                            <input type="text" class="form-control" id="last_name" @error('last_name')
                                                is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"
                                                placeholder="Last Name" required>
                                        </fieldset>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Email</legend>
                                            <input type="text" id="email" class="form-control"
                                                pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="email@email.com"
                                                @error('email') is-invalid @enderror name="email"
                                                value="{{ old('email') }}" required>
                                        </fieldset>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Phone Number</legend>
                                            <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                class="form-control" id="phone_number" @error('phone_number')
                                                is-invalid @enderror name="phone_number"
                                                value="{{ old('phone_number') }}" placeholder="Phone Number"
                                                required>
                                        </fieldset>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Password</legend>
                                            <input type="password" class="form-control" id="password"
                                                @error('password') is-invalid @enderror name="password"
                                                value="{{ old('password') }}" placeholder="password" required>
                                        </fieldset>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Branch</label>
                                        <select name="branch" id="branch">
                                            <option value="branch" disabled selected>Branch</option>
                                            @foreach ($branchs as $branch)
                                            <option value="{{ $branch->branch_id}}" @if (old("branch") == "{{ $branch->branch_id}}" ) {{  "selected" }}@else {{ "" }} @endif> {{ $branch->branch_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>
                            <p class="step-icon"><span>02</span></p>
                            <span class="step-text">Personal Infomation</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Tentor Personal Infomation</h3>
                                    <p>Please enter your infomation and proceed to the next step so we can build your
                                        accounts. </p>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Address</legend>
                                            <input type="text" name="address" id="address" class="form-control"
                                                @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" placeholder="Address" required>
                                        </fieldset>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Place Of Birth</legend>
                                            <input type="text" name="pob" id="pob" class="form-control" @error('pob')
                                                is-invalid @enderror" name="pob" value="{{ old('pob') }}"
                                                placeholder="Place Of Birth" required>
                                        </fieldset>
                                        @error('pob')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ 'Please insert your place of birth correctly!' }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Date Of Birth:</label>
                                    </div>
                                </div>

                                <div class="form-group required" style="margin-top: -2em;">
                                    <div class="input-group datepick">
                                        <input type="text" class="form-control" name="dob" id="dob" @error('dob')
                                            is-invalid @enderror" name="dob" value="{{ old('dob') }}" required
                                            readonly>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <div class="text-danger">
                                                {{ 'Please insert your date of birth correctly!' }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Religion:</label>
                                        <select name="religion" id="religion" required>
                                            <option value="Religion" disabled selected>Religion</option>
                                            <option value="muslim" @if (old("religion") == 'muslim') {{  "selected" }}@else {{ "" }} @endif > Muslim </option>
                                            <option value="kristen" @if (old("religion") == 'kristen') {{  "selected" }}@else {{ "" }} @endif > Kristen </option>
                                            <option value="katolik" @if (old("religion") == 'katolik') {{  "selected" }}@else {{ "" }} @endif > Katolik </option>
                                            <option value="hindu" @if (old("religion") == 'hindu') {{  "selected" }}@else {{ "" }} @endif > Hindu </option>
                                            <option value="buddha" @if (old("religion") == 'buddha') {{  "selected" }}@else {{ "" }} @endif > Buddha </option>
                                            <option value="konghucu" @if (old("religion") == 'konghucu') {{  "selected" }}@else {{ "" }} @endif > Konghucu </option>
                                        </select>
                                    </div>
                                </div>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Gender:</label>
                                        <select name="gender" id="gender">
                                            <option value="Gender" disabled selected>Gender</option>
                                            <option value="Male" @if (old("gender") == 'Male') {{  "selected" }}@else {{ "" }} @endif > Male </option>
                                            <option value="Female" @if (old("gender") == 'Female') {{  "selected" }}@else {{ "" }} @endif > Female </option>
                                        </select>
                                    </div>
                                </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <p class="step-icon"><span>03</span></p>
                            <span class="step-text">Education Infomation</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Tentor Education Infomation</h3>
                                    <p>Please enter your education infomation and proceed to the next step so we can
                                        build your
                                        accounts. </p>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Job Status:</label>
                                        <select name="job_status" id="job_status">
                                            <option value="" disabled selected>Job Status</option>
                                            <option value="student" @if (old("job_status") == 'student') {{  "selected" }}@else {{ "" }} @endif > Student </option>
                                            <option value="teacher" @if (old("job_status") == 'teacher') {{  "selected" }}@else {{ "" }} @endif >Teacher</option>
                                            <option value="college_student" @if (old("job_status") == 'college_student') {{  "selected" }}@else {{ "" }} @endif >College student</option>
                                            <option value="other"  @if (!old("job_status") == '' and old("job_status") == 'other') {{  "selected" }}@else {{ "" }}  @endif }}>Other</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row" id="other-job_status-div">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Other Job Status</legend>
                                            <input type="text" name="other_job_status" id="other_job_status" class="form-control"
                                                pattern="\d*" maxlength="16" minlength="16" @error('other_job_status')
                                                is-invalid @enderror" name="other_job_status"
                                                value="{{ old('other_job_status') }}" placeholder="Other Job" required>
                                        </fieldset>

                                    </div>
                                </div>
                                @error('job_status')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                    <br>
                                @enderror

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Highest Education Qualifications :</label>
                                        <select name="last_education" id="last_education">
                                            <option value="" disabled selected>Your Highest Education</option>
                                            <option value="S1" @if (old("last_education") == 'S1') {{  "selected" }}@else {{ "" }} @endif > S1 </option>
                                            <option value="S2" @if (old("last_education") == 'S2') {{  "selected" }}@else {{ "" }} @endif > S2 </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row" id="education_major">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Major Education</legend>
                                            <input type="text" name="education_major" id="education_major"
                                                class="form-control" @error('education_major') is-invalid @enderror"
                                                name="education_major" value="{{ old('education_major') }}"
                                                placeholder="Your Major Education" required>
                                        </fieldset>
                                        @error('Job Status')
                                            <span class="invalid-feedback" role="alert">
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                            <br>
                                        @enderror
                                    </div>
                                </div>
                                @error('last_education')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                    <br>
                                @enderror

                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepick').datetimepicker({
                format: 'yyyy-M-DD',
                ignoreReadonly: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var value = document.getElementById("job_status").value;
            if (value === "other"){
                $("#other-job_status-div").show();
            }else{
                $("#other-job_status-div").hide();
            }
            
            $("#job_status").on("change", function() {
                if ($(this).val() === "other") {
                    $("#other-job_status-div").show();
                } else {
                    $("#other-job_status-div").hide();
                }
            });
        });

        $(document).ready(function() {
            var value2 = document.getElementById("last_education").value;
            if (value2 != ""){
                $("education_major").show();
            }else{
                $("#education_major").hide();
            }
            $("#last_education").on("change", function() {
                $("#education_major").show();
            });
        });
    </script>
</body>

</html>
