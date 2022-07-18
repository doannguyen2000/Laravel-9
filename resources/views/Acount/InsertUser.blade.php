@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')
    @include('layouts.header')

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account/</span>
                Insert</h4>
            <form id="formAccountSettings" action="{{ route('admin.managementUser.checkInsertUser') }}" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                    <!-- Vertical Scrollbar -->
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Profile Details</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ asset('mau/assets/img/avatars/user.jpeg') }}" alt="user-avatar"
                                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block" onclick="$('#file-avata').click();">New
                                                avata</span>
                                        </label>
                                        @error('file')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                {{-- <form id="formAccountSettings" action="{{ route('admin.managementUser.checkInsertUser') }}"
                                method="POST" enctype="multipart/form-data"> --}}
                                @csrf
                                @include('layouts.alert')
                                <div class="row">
                                    <input id="file-avata" type="file" name="file" style="display: none;">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">User name</label>
                                        <input class="form-control" type="text" name="name" id="lastName"
                                            value="{{ old('name') }}" placeholder="Doe" />
                                        @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                            placeholder="john.doe@example.com" placeholder="john.doe@example.com"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="organization" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="organization" name="password"
                                            placeholder="ThemeSelection" value="{{ old('password') }}" />
                                        @error('password')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="language" class="form-label">Role</label>
                                        <select value="{{ old('role') }}" id="language" name="role"
                                            class="select2 form-select" placeholder="Choose a position">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2" onclick="checkedRadio()">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                                {{-- </form> --}}
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                    <!--/ Vertical Scrollbar -->

                    <!-- All Courses -->
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">All Courses</h5>
                            <div class="card-body" id="horizontal-example">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover border">
                                        {{-- <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Course name</th>
                                            <th></th>
                                        </tr>
                                    </thead> --}}
                                        <tbody class="table-border-bottom-0">

                                            @isset($listCourses)
                                                @php
                                                    $stt = 1;
                                                @endphp
                                                @foreach ($listCourses as $row)
                                                    <tr>

                                                        <td>
                                                            @php
                                                                echo $stt++;
                                                            @endphp
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-label-primary me-1">@php
                                                                echo $row->course_name;
                                                            @endphp</span>
                                                        </td>
                                                        {{-- <td>
                                                        @php
                                                            echo $row->course_description;
                                                        @endphp
                                                    </td> --}}
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="@php
                                                                echo $row->id;
                                                            @endphp"
                                                                    id="defaultCheck2" name="check_register_course[]"
                                                                    checked="">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    register </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());

                        document.getElementById('file-avata').onchange = function() {
                            var src = URL.createObjectURL(this.files[0])
                            document.getElementById('uploadedAvatar').src = src
                        }
                    </script>
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
        function checkedRadio() {
            var checkbox = document.getElementsByName('check_register_course[]');
            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked === true) {
                    if (checkbox[i].checked === true) {
                        checkbox[i].removeAttribute('name');
                    }
                }
            }
    </script>
@endsection
