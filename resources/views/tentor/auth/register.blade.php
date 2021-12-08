<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tentor Register</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/opensans-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                <form class="form-register" action="#" method="post">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <p class="step-icon"><span>01</span></p>
                            <span class="step-text">Account Infomation</span>
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
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="First Name" required>
                                        </fieldset>
                                    </div>
                                    <div class="form-holder">
                                        <fieldset>
                                            <legend>Last Name</legend>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Last Name" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>NIK</legend>
                                            <input type="text" name="NIK" id="NIK" class="form-control" pattern="\d*"
                                                maxlength="16" minlength="16" placeholder="NIK" required>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Email</legend>
                                            <input type="text" name="email" id="email" class="form-control"
                                                pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="email@email.com"
                                                required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Phone Number</legend>
                                            <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                class="form-control" id="phone_number" name="phone_number"
                                                placeholder="Phone Number" required>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Password</legend>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="password" required>
                                        </fieldset>
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
                                                placeholder="Address" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Place Of Birth</legend>
                                            <input type="text" name="pob" id="pob" class="form-control"
                                                placeholder="Place Of Birth" required>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Date Of Birth:</label>
                                    </div>
                                </div>

                                <div class="form-group required" style="margin-top: -6%;">
                                    <div class="input-group datepick">
                                        <input type="text" class="form-control" name="frmSaveOffice_startdt"
                                            id="frmSaveOffice_startdt" required readonly>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Religion:</label>
                                        <select name="gender" id="gender">
                                            <option value="Religion" disabled selected>Religion</option>
                                            <option value="muslim">Muslim</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="special-label">Gender:</label>
                                        <select name="gender" id="gender">
                                            <option value="Gender" disabled selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

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
                                            <option value="Job Status" disabled selected>Job Status</option>
                                            <option value="student">Student</option>
                                            <option value="working">Working</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Highest Education Qualifications</legend>
                                            <input type="text" name="last_education" id="last_education"
                                                class="form-control" pattern="\d*" maxlength="16" minlength="16"
                                                placeholder="Your Highest Education" required>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!---*** End: JQuery 3.3.1 version. ***--->
    <!---*** Start: Bootstrap 3.3.7 version files. ***--->
    <script language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepick').datetimepicker({
                format: 'L',
                ignoreReadonly: true
            });
        });
    </script>
</body>

</html>
