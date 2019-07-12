@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <form action="">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Umur</label>
                            <input type="text" name="umur" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Cita-cita</label>
                            <input type="text" name="cita_cita" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hobby</label>
                            <input type="text" name="hobby" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Guru</label>
                            <input type="text" name="guru" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <tr>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Cita-cita</th>
                                <th>Hobby</th>
                                <th>Guru</th>
                            </tr>
                            <tbody class="data-siswa"></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 