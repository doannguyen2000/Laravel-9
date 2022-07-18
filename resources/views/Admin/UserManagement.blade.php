@extends('layouts.masterAdmin')

@section('title')
    Admin/User
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <h5 class="card-header">Bordered Table</h5>

                <div class="card-body">
                    <a href="{{ route('admin.managementUser.insertUser') }}" class="btn btn-secondary">
                        <span class="tf-icons bx bx-user-plus"></span>&nbsp; New User
                    </a>
                    <div class="text-nowrap  mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avata</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($users)
                                    @foreach ($users as $row)
                                        <tr>

                                            <td>
                                                @php
                                                    echo $row->id;
                                                @endphp
                                            </td>
                                            <td>
                                                <img src="
                                                @if (strpos($row->avata, 'via')) {{ $row->avata }}
                                                @else
                                                {{ asset('mau/assets/img/avatars/' . $row->avata) }} @endif
                                                
                                                "
                                                    alt="user-avatar" class="d-block rounded" height="80" width="80"
                                                    id="uploadedAvatar" />
                                            </td>
                                            <td>
                                                @php
                                                    echo $row->name;
                                                @endphp
                                            </td>
                                            <td>
                                                @php
                                                    echo $row->email;
                                                @endphp
                                            </td>
                                            <td>
                                                *****
                                            </td>
                                            <td>
                                                @php
                                                    echo $row->role;
                                                @endphp
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('user.profile', ['id' => $row->id]) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.managementUser.deleteUser', ['id' => $row->id]) }}"><i
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
                    {{ $users->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
        <!-- / Content -->

        {{-- <div class="mt3">
            {{ $users->onEachSide(5)->links() }}
        </div> --}}
        <div class="content-backdrop fade"></div>
    </div>
@endsection
