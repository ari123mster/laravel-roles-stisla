@extends('layouts.dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Users</a></div>
                    <div class="breadcrumb-item"><a href="#">user</a></div>

                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data user</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @can('user-create')
                                    <form action="{{ route('user.create') }}">
                                        <button class="btn btn-primary">Tambah</button>
                                    </form>
                                @endcan
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-1">
                                                    <thead>
                                                        <tr>
                                                            <th>no</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Password</th>
                                                            <th>Hak Akses</th>
                                                            {{-- <th>Action</th> --}}
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user as $index => $user)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->password }}</td>
                                                                <td>
                                                                    @foreach ($user->roles()->pluck('name') as $item)
                                                                        <span class="badge badge-primary">
                                                                            {{ $item }}</span>
                                                                    @endforeach
                                                                </td>

                                                                <td>
                                                                    @can('user-edit')
                                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                                            class="btn btn-warning ">Edit</a>
                                                                    @endcan
                                                                </td>
                                                                <td>
                                                                    @can('user-delete')
                                                                        <form action="{{ route('user.destroy', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-danger d-inline">
                                                                                hapus
                                                                            </button>
                                                                        </form>
                                                                    @endcan
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush
