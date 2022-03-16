<title>{{ 'Tentors Dashboard' }}</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Dashboard</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ config('app.name', 'Neo Edukasi') }}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        @error('msg')
            <div class="block content-full">
                <center>
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                </center>
            </div>
        @enderror
        @error('inactive')
            <div class="block content-full">
                <center>
                    <div class="alert alert-danger">{{ $message }}</div>
                </center>
            </div>
        @enderror
        @error('declinemsg')
            <div class="block content-full">
                <div class="alert alert-danger">
                    <center>
                        {{ $message }}
                    </center>

                    @if ($reasons->ktp_status == 0)
                        <div class="row">
                            <div class="col-6 col-md-3 tittle-neo">
                                KTP
                            </div>
                            <div class="col-6 col-md-6">
                                {{ ': ' . $reasons->ktp_decline_reason }}
                            </div>
                        </div>
                    @endif
                    @if ($reasons->ijazah_status == 0)
                        <div class="row">
                            <div class="col-6 col-md-3 tittle-neo">
                                Ijazah
                            </div>
                            <div class="col-6 col-md-6">
                                {{ ': ' . $reasons->ijazah_decline_reason }}
                            </div>
                        </div>
                    @endif
                    @if ($reasons->transkip_status == 0)
                        <div class="row">
                            <div class="col-6 col-md-3 tittle-neo">
                                Transkip
                            </div>
                            <div class="col-6 col-md-6">
                                {{ ': ' . $reasons->transkip_decline_reason }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @enderror
        <div class="block">
            <div class="block-content block-content-full">
                <div class="block-header justify-content-center">

                    @error('inactive')
                        <button type="button" class="btn btn-neo btn-sm">
                            <a href="{{ route('tentor.verification') }}"
                                class="btn btn-sm btn-neo pull-right">Verify</a></button>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
