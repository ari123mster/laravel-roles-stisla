@extends('layouts.dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Users</a></div>
                    <div class="breadcrumb-item"><a href="#">Hak Akses</a></div>

                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Hak Akses</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @can('role-create')
                                    <form action="{{ route('roles.create') }}">
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
                                                            <th></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($roles as $index => $role)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td> <span
                                                                        class="badge badge-primary">{{ $role->name }}</span>
                                                                </td>

                                                                <td>
                                                                    @can('role-show')
                                                                        <a href="{{ route('roles.show', $role->id) }}"
                                                                            class="btn btn-info ">Show</a>
                                                                    @endcan

                                                                    @can('role-edit')
                                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                                            class="btn btn-warning ">Edit</a>
                                                                    @endcan


                                                                    @can('role-delete')
                                                                        <form action="{{ route('roles.destroy', $role->id) }}"
                                                                            method="POST" class="d-inline">

                                                                            @csrf
                                                                            @method('DELETE')

                                                                            <button class="btn btn-danger d-inline">
                                                                                Hapus
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
