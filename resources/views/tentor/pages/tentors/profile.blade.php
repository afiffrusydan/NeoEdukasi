<title>{{ 'Tentors Dashboard' }}</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="content">
        <div class="block-rounded shadow-sm">
            <div class="bg-image bg-white border-bottom" style="background-color: #dad5b7;">
                <img class="rounded" src="{{ asset('images/Asset/header-vacancy-detail.png') }}" alt="Header Avatar"
                    style="max-width:100%;">
                <div class="text-center pt-2 pb-1">
                    <img class="img-avatar" src="{{ asset('images/Asset//vacancy-avatar.png') }}" alt="Header Avatar">
                    <h1 class="font-size-h3 neo mt-2 mb-0">{{ $tentors->first_name . ' ' . $tentors->last_name }}</h1>
                </div>
            </div>
            <div class="bg-white border-bottom">
                <div class="content content-boxed">
                    <div class="row items-push text-center">
                        <div class="col-6 col-md-6">
                            <div class="font-size-sm font-w600 text-muted text-uppercase">Branch</div>
                            <a class="link-fx font-size-h4" href="javascript:void(0)">{{ $tentors->branch_name }}</a>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="font-size-sm font-w600 text-muted text-uppercase">Tittle 2</div>
                            <a class="link-fx font-size-h3" href="javascript:void(0)">xxxx</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Stats -->

    <!-- Page Content -->
    <div class="content content-boxed justify-content-center">
        <div class="row">
            @error('inactive')
                <div class="col-md-12 col-md-12">
                    <div class="block content-full">
                        <div class="alert alert-danger text-center">{{ $message }}</div>
                    </div>
                </div>
            @enderror
            <div class="order-2 col-12 col-md-9 order-md-1">

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
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-user me-1"></i> <small>Name</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left" name="fullname"
                                                    id="fullname"
                                                    value="{{ $tentors->first_name . ' ' . $tentors->last_name }}"
                                                    disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-id-badge me-1"></i> <small>NIK</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left" id="NIK" name="NIK"
                                                    value="{{ $tentors->NIK }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-venus-mars me-1"></i> <small>Gender</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left" id="gender" name="gender"
                                                    value="{{ $tentors->gender }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block" style="height: 100%"
                                                    disabled>
                                                    <i class="fa fa-address-card me-1"></i> <small>Address</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control text-left" id="address" name="address"
                                                    placeholder="{{ $tentors->address }}" disabled
                                                    rows="2"></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-map me-1"></i> <small>Place Of Birth</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left editable " id="POB"
                                                    name="POB" value="{{ $tentors->POB }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block editable"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-calendar-day me-1"></i> <small>Date Of Birth</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left" id="DOB" name="DOB"
                                                    value="{{ date('d F Y', strtotime($tentors->DOB)) }}" disabled>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block editable"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fa fa-praying-hands me-1"></i> <small>Religion</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9 form-holder form-holder-2">
                                                <select class="form-control text-left align-bottom religion" name="religion" id="religion" disabled>
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
                                <div class="row">
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block editable"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fas fa-phone-square me-1"></i><small> Phone Number </small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left align-bottom"
                                                    id="phoneNumber" name="phoneNumber" style="height: 100%"
                                                    value="{{ ucwords($tentors->phone_number) }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block "
                                                    style="max-width: 100%" disabled>
                                                    <i class="fas fa-envelope me-1"></i><small> Email</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left align-bottom editable"
                                                    id="email" name="email" style="height: 100%"
                                                    value="{{ ucwords($tentors->email) }}" disabled>
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
                                <div class="row">
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block "
                                                    style="max-width: 100%" disabled>
                                                    <i class="fas fa-graduation-cap me-1"></i><small> Last
                                                        Education</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left align-bottom editable"
                                                    id="lastEducation" name="lastEducation" style="height: 100%"
                                                    value="{{ ucwords($tentors->last_education) }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-4 col-12">
                                        <div class="input-group">
                                            <div class="col-12 col-md-3">
                                                <button type="button" class="btn btn-profile btn-block"
                                                    style="max-width: 100%" disabled>
                                                    <i class="fas fas fa-briefcase me-1"></i><small> Job</small>
                                                </button>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control text-left align-bottom editable"
                                                    id="jobStatus" name="jobStatus" style="height: 100%"
                                                    value="{{ ucwords($tentors->job_status) }}" disabled>
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
                                                <button type="button" class="btn btn-sm btn-neo ">
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
            @if ($tentors->account_status != -10)
                <div class="order-1 col-12 col-md-3 pull-right order-md-2 pb-4">
                    <div class="bg-white border-bottom shadow-sm">
                        <div class="content block-content">
                            <li class="nav-main-item">
                                <a id="editProfile" href="#/" class="nav-main-link  link-fx font-size-h3">
                                    <span class="nav-main-link-name font-size-h6">Edit Profile</span>
                                </a>
                            </li>
                            @if ($tentors->account_status >= 10)
                                <li class="nav-main-item mb-3">
                                    <a class="nav-main-link  link-fx font-size-h3"
                                        href="{{ route('tentor.bankaccount') }}">
                                        <span class="nav-main-link-name font-size-h6">Bank Account</span>
                                    </a>
                                </li>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        var elem = document.getElementById('saveDiv');
        $("a#editProfile").click(function(event) {
            var status = {{ $tentors->account_status }};
            if (status == 10) {
                if ($('#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ').is(
                        ':disabled')) {
                    $("#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ").prop(
                        "disabled", false);
                        $('#religion').removeAttr('disabled');
                    elem.style.display = 'block';
                }else {
                    $("#phoneNumber, #address, #email, #POB, #DOB, #religion, #jobStatus, #lastEducation ").prop(
                        "disabled", true);
                    elem.style.display = 'none';
                }
            } else {
                if ($("#editProfile input,textarea").is(':disabled')) {
                    $("#editProfile input,textarea").prop("disabled", false);
                    elem.style.display = 'block';
                } else {
                    $("#editProfile input,textarea").prop("disabled", true);
                    elem.style.display = 'none';
                }

            }
        });
    </script>
    <!-- END Page Content -->
@endsection
