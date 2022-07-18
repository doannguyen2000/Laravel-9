@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    @include('layouts.header')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y" onclick="window.location='{{ route('login')}}'"> 
            <div class="row mb-5">
                @isset($courses)
                    @foreach ($courses as $row)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">@php
                                        echo $row->course_name;
                                    @endphp</h5>
                                    <p class="card-text">@php
                                        echo $row->course_description;
                                    @endphp
                                    </p>
                                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
