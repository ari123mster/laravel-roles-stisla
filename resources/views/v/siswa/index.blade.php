@extends('layouts.dashboard')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Menu siswa</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active" aria-current="page">siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="button">
                        @can('siswa-create')
                            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Nama</th>
                                <th>Alamat</th>

                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $s)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>
                                        @can('siswa-edit')
                                            <a href="{{ route('siswa.edit', $s->id) }}" class="bi bi-pencil-square "></a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('siswa-delete')
                                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn">
                                                    <i class=" bi bi-trash-fill"></i>
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
