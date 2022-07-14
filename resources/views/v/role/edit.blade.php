@extends('layouts.dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('roles.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Hak AKses</h1>
                <div class="section-header-breadcrumb">

                    <div class="breadcrumb-item"><a href="#">Hak AKses</a></div>
                    <div class="breadcrumb-item"><a href="#">Edit Data</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Hak AKses</h2>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-md-12 ">
                            <div class="card">


                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('roles.update', $roles->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="name" class="form-control"
                                                            name="name" value="{{ $roles->name }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Hak Akses</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <table>
                                                            @foreach ($permission as $permission)
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox"
                                                                            name="permission[{{ $permission->name }}]"
                                                                            value="{{ $permission->name }}"
                                                                            class='permission'>
                                                                    </td>
                                                                    <td>{{ $permission->name }}</td>

                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
