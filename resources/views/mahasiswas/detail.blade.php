@extends('mahasiswas.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                    <div class="card-header">Detail Mahasiswa</div>

                    <div class="card-body text-center">
                        <table class="table table-responsive">
                            <tr>
                                <th>Nim</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->Nim }}</td>
                            </tr>

                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->Nama }}</td>
                            </tr>

                            <tr>
                                <th>Kelas</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->Kelas->nama_kelas }}</td>
                            </tr>

                            <tr>
                                <th>Jurusan</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->Jurusan }}</td>
                            </tr>

                            <tr>
                                <th>No Handphone</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->No_Handphone }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->Email }}</td>
                            </tr>

                            <tr>
                                <th>TTL</th>
                                <th>:</th>
                                <td>{{ $Mahasiswa->TTL }}</td>
                            </tr>

                            <tr>
                                <td">
                                    <img width="200px" height="100px" src="{{ asset('storage/' . $Mahasiswa->Foto) }}"
                                        style="object-fit: cover">
                                    </td>
                            </tr>
                        </table>
                        {{-- <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Nim : </b>{{ $Mahasiswa->Nim }}</li>
                            <li class="list-group-item"><b>Nama : </b>{{ $Mahasiswa->Nama }}</li>
                            <li class="list-group-item"><b>Kelas : </b>{{ $Mahasiswa->Kelas }}</li>
                            <li class="list-group-item"><b>Jurusan : </b>{{ $Mahasiswa->Jurusan }}</li>
                            <li class="list-group-item"><b>No_Handphone : </b>{{ $Mahasiswa->No_Handphone }}</li>
                        </ul> --}}
                    </div>
                    <a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a>

                </div>
            </div>
        </div>
    </div>
@endsection
