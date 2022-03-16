<title>{{ 'Tentors Dashboard' }}</title>
@extends('tentor.layouts.app')

@section('content')

    <div class="bg-image" style="background-color: #dad5b7;">
        <div class="">
            <div class="content content-full text-center">
                <div class="my-5">
                    ASSSS
                </div>
                <h1 class="h2 text-black mb-0">{{ $tentors->first_name . ' ' . $tentors->last_name }}</h1>

            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Stats -->
    <div class="bg-white border-bottom">
        <div class="content content-boxed">
            <div class="row items-push text-center">
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Branch</div>
                    <a class="link-fx font-size-h4" href="javascript:void(0)">{{ $tentors->branch_name }}</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Tittle 2</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">xxxx</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Tittle 3</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">xxxx</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase mb-2">Tittle 4</div>

                    <span class="font-size-sm text-muted">xxxx</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Stats -->

    <!-- Page Content -->
    <div class="content content-boxed justify-content-center">
        <div class="row">
            @error('inactive')
                <div class="col-md-12 col-xl-12">
                    <div class="block content-full">
                        <div class="alert alert-danger text-center">{{ $message }}</div>
                    </div>
                </div>
            @enderror
            <div class="col-md-12 col-xl-9">

                <form id="editProfile">
                    <ul class="timeline timeline-alt py-0">
                        <li class="timeline-event">
                            <div class="timeline-event-icon bg-default">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="timeline-event-block block invisible shadow" data-toggle="appear">
                                <div class="block-header">
                                    <h3 class="block-title">Personal Information</h3>
                                </div>
                                <div class="block-content">

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-user me-1"></i> <small>Name</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right" name="fullname" id="fullname"
                                                    value="{{ $tentors->first_name . ' ' . $tentors->last_name }}"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-id-badge me-1"></i> <small>NIK</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right" id="NIK" name="NIK"
                                                    value="{{ $tentors->NIK }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-venus-mars me-1"></i> <small>Gender</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right" id="gender" name="gender"
                                                    value="{{ $tentors->gender }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="height: 100%"
                                                    disabled>
                                                    <i class="fa fa-address-card me-1"></i> <small>Address</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control text-right" id="address" name="address"
                                                    placeholder="{{ $tentors->address }}" disabled rows="2"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-map me-1"></i> <small>Place Of Birth</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right editable " id="POB" name="POB"
                                                    value="{{ $tentors->POB }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block editable" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-calendar-day me-1"></i> <small>Date Of Birth</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right" id="DOB" name="DOB"
                                                    value="{{ date('d F Y', strtotime($tentors->DOB)) }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block editable" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fa fa-praying-hands me-1"></i> <small>Religion</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right" id="religion" name="religion"
                                                    value="{{ ucwords($tentors->religion) }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-event">
                            <div class="timeline-event-icon bg-info">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div class="timeline-event-block block invisible shadow" data-toggle="appear">
                                <div class="block-header">
                                    <h3 class="block-title">Contact Information</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block editable" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fas fa-phone-square me-1"></i><small> Phone Number </small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right align-bottom" id="phoneNumber" name="phoneNumber"
                                                    style="height: 100%" value="{{ ucwords($tentors->phone_number) }}"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block " style="max-width: 100%"
                                                    disabled>
                                                    <i class="fas fa-envelope me-1"></i><small> Email</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right align-bottom editable" id="email" name="email"
                                                    style="height: 100%" value="{{ ucwords($tentors->email) }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-event">
                            <div class="timeline-event-icon bg-modern">
                                <i class="fas fas fa-graduation-cap"></i>
                            </div>
                            <div class="timeline-event-block block invisible shadow" data-toggle="appear">
                                <div class="block-header">
                                    <h3 class="block-title">Other Information</h3>

                                </div>
                                <div class="block-content block-content-full">
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block " style="max-width: 100%"
                                                    disabled>
                                                    <i class="fas fa-graduation-cap me-1"></i><small> Last
                                                        Education</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right align-bottom editable" id="lastEducation" name="lastEducation"
                                                    style="height: 100%" value="{{ ucwords($tentors->last_education) }}"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-neo btn-block" style="max-width: 100%"
                                                    disabled>
                                                    <i class="fas fas fa-briefcase me-1"></i><small> Job</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-right align-bottom editable" id="jobStatus" name="jobStatus"
                                                    style="height: 100%" value="{{ ucwords($tentors->job_status) }}"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="timeline-event" id="saveDiv" style="display: none">
                            <div class="timeline-event-icon bg-modern">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="timeline-event-block block invisible shadow" data-toggle="appear">
                                <div class="block-header">
                                    <h3 class="block-title">Setting</h3>

                                </div>
                                <div class="block-content block-content-full">
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-12 text-center">
                                                <button type="button" class="btn btn-neo ">
                                                    Save Changes
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="col-md-12 col-xl-3 pull-right ">
                <div class="bg-white border-bottom shadow-sm">
                    <div class="content content-boxed">
                        <li class="nav-main-item">
                            <a id="editProfile" href="#/" class="nav-main-link  link-fx font-size-h3">
                                <span class="nav-main-link-name font-size-h6">Edit Profile</span>
                            </a>
                        </li>
                        @if ($tentors->account_status == 10)
                        <li class="nav-main-item mb-3">
                            <a class="nav-main-link  link-fx font-size-h3" href="{{ route('tentor.bankaccount') }}">
                                <span class="nav-main-link-name font-size-h6">Bank Account</span>
                            </a>
                        </li>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var elem = document.getElementById('saveDiv');
        $("a#editProfile").click(function(event) {
            var status = {{ $tentors->account_status }};
            if (status == 10) {
                if($('#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ').is(':disabled')){
                    $("#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ").prop("disabled", false);
                    elem.style.display = 'block';
                }else{
                    $("#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ").prop("disabled", true);
                    elem.style.display = 'none';
                }
            } else {
                if($("#editProfile input,textarea").is(':disabled')){
                    $("#editProfile input,textarea").prop("disabled", false);
                    elem.style.display = 'block';
                }else{
                    $("#editProfile input,textarea").prop("disabled", true);
                    elem.style.display = 'none';
                }
                
            }
        });
    </script>
    <!-- END Page Content -->
@endsection
