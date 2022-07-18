@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    @include('layouts.header')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Course/</span>
                Insert course </h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">New course</h5>
                        <hr class="my-0" />
                        <div class="card-body">

                            <form id="formAccountSettings" action="{{ route('admin.managementCourse.checkInsertCourse') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('layouts.alert')
                                <div class="row">
                                    <input id="file-avata" type="file" name="file" style="display: none;">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Course's name</label>
                                        <input class="form-control" type="text" name="course_name" id="lastName"
                                            placeholder="Doe" value="{{ old('course_name') }}" />
                                        @error('course_name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-message">Course's description</label>
                                        <textarea id="basic-default-message" name="course_description" class="form-control"
                                            placeholder="Hi, Do you have a moment to talk Joe?">{{ old('course_description') }}</textarea>
                                        @error('course_description')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="organization" class="form-label">Course's content</label>
                                        <textarea name="course_content" id="content1" rows="10" cols="80">
                                            {{ old('course_content') }}
                                        </textarea>
                                        @error('course_content')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>
                        {{-- @endforeach --}}
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                        Themes</a>

                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>

                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('content1');
    </script>
@endsection
