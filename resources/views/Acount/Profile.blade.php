@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    @include('layouts.header')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account/</span>
                Profile</h4>
            <form id="formAccountSettings" action="{{ route('admin.managementUser.updateUser') }}" method="POST"
                enctype="multipart/form-data" >
                <div class="row" onclick="$('#group_save').css('display', 'block');">
                    <div class="col-md-6 col-sm-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Profile Details</h5>
                            <!-- Account -->
                            {{-- @foreach ($infor as $row) --}}
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src=" @if (strpos($infor->avata, 'via'))
                                    {{ $infor->avata }}
                                @else
                                {{ asset('mau/assets/img/avatars/' . $infor->avata) }}
                                @endif" alt="user-avatar"
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
                                @csrf
                                @include('layouts.alertAll')
                                <div class="row">
                                    <input type="text" name="id" value="@php echo $infor->id @endphp" style="display: none;">
                                    <input id="file-avata" type="file"  name="file" style="display: none;">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">User name</label>
                                        <input value="@php echo $infor->name @endphp" class="form-control" type="text"
                                            name="name" id="lastName" placeholder="Doe" />
                                            @error('name')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input value="@php echo $infor->email @endphp" class="form-control" type="text"
                                            id="email" name="email" placeholder="john.doe@example.com"
                                            placeholder="john.doe@example.com" />
                                            @error('email')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="organization" class="form-label">Password</label>
                                        <input disabled value="@php echo $infor->password @endphp" type="password"
                                            class="form-control" id="organization" name="password"
                                            placeholder="ThemeSelection" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="language" class="form-label">Role</label>
                                        <select id="language" name="role" class="select2 form-select"
                                            placeholder="Choose a position">
                                            <option @if ($infor->role == 'user') @selected(true) @endif value="user">
                                                User</option>
                                            <option @if ($infor->role == 'admin') @selected(true) @endif value="admin">
                                                Admin</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="mt-2" id="group_save" style="display: none">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <a href="" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                            <!-- /Account -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 row">
                        <div class="col-md-12" style="height: auto;">
                            <div class="card">
                                <h5 class="card-header">Your's Courses</h5>
                                <div class="card-body">
                                    <div class="text-nowrap">
                                        <table class="table table-hover border">
                                            <tbody class="table-border-bottom-0">
                                                @isset($userCourses)
                                                    @php
                                                        $stt = 1;
                                                    @endphp
                                                    @foreach ($userCourses as $row)
                                                        <tr>
                                                            <td>
                                                                @php
                                                                    echo $stt++;
                                                                @endphp
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-label-primary me-1">@php
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
                                                                        id="defaultCheck2" name="check_user_course[]">
                                                                    <label class="form-check-label" for="defaultCheck2">
                                                                        delete course </label>
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
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">All Courses</h5>
                                <div class="card-body" id="horizontal-example">
                                    <div class="text-nowrap">
                                        <table class="table table-hover border">
                                            <tbody class="table-border-bottom-0">
                                                @isset($allCourses)
                                                    @php
                                                        $stt = 1;
                                                    @endphp
                                                    @foreach ($allCourses as $row)
                                                        <tr>
                                                            <td>
                                                                @php
                                                                    echo $stt++;
                                                                @endphp
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-label-primary me-1">@php
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
                                                                        id="defaultCheck2" name="check_register_course[]">
                                                                    <label class="form-check-label" for="defaultCheck2">
                                                                        register course </label>
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
                </div>
            </form>
        </div>
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

            var checkbox_uc = document.getElementsByName('check_user_course[]');
            
            for (var i = 0; i < checkbox_uc.length; i++) {
                if (checkbox_uc[i].checked === true) {
                    if (checkbox_uc[i].checked === true) {
                        checkbox_uc[i].removeAttribute('name');
                    }
                }
            }
    </script>
@endsection
