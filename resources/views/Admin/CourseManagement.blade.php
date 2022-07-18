@extends('layouts.masterAdmin')

@section('title')
    Admin/User
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card" style="width: 100%;">
                <h5 class="card-header">Bordered Table</h5>

                <div class="card-body">
                    <a href="{{ route('admin.managementCourse.insertCourse')}}" class="btn btn-secondary">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; New Course
                    </a>
                    <div class="mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Course's name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Author</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($courses)
                                    @foreach ($courses as $row)
                                        <tr>

                                            <td scope="row">
                                                <p>
                                                    @php
                                                        echo $row->id;
                                                    @endphp
                                                </p>

                                            </td>
                                            <td>
                                                <p>
                                                    @php
                                                        echo $row->course_name;
                                                    @endphp
                                                </p>

                                            </td>
                                            <td>
                                                <p style="overflow: hidden;height: 25px;margin-bottom: 0px;">@php
                                                    echo $row->course_description;
                                                @endphp

                                                </p>...

                                            </td>
                                            <td>
                                                <p>
                                                    @php
                                                        echo $row->course_author_id;
                                                    @endphp
                                                </p>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.managementCourse.showCourse', ['id' => $row->id]) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.managementCourse.deleteCourse', ['id' => $row->id]) }}"><i
                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    {{ $courses->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
        <!-- / Content -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection
