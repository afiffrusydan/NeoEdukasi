<title>{{ 'Dashboard' }}</title>
@extends('tentor.layouts.app')
@section('content')
    <!-- Hero -->

    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
                                background-image:url({{ asset('images/Asset/header-tentors.png') }});">
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
        <div class="block shadow-sm">
            <div class="block-header">
                
            </div>
            <div class="block-content block-content-full">
                @error('inactive')
                <div class="text-center">
                    <button type="button" class="btn btn-sm">
                        <a href="{{ route('tentor.verification') }}"
                        class="btn btn-sm btn-neo pull-right btn-block">Verify</a></button>
                </div>
            @enderror
            @if (empty($images))
            @else
                <div class="filemanager">
                    <ul class="list-unstyled">
                        @foreach ($images as $image)
                            <li class="files py-1"><a target="_blank" href="{{ route('getfile', $image) }}"><span
                                        class="icon file fa fa-file">&nbsp</span><span
                                        class="name">{{ $image }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
