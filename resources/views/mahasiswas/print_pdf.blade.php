@extends('mahasiswas.layout')

@section('css')
    <style>
        .table,
        .table td,
        .table th {
            border: 1px solid;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-5">JURUSAN TEKNOLGI INFORMASI - POLITEKNIK NEGERI MALANG</h2>
        <h2 class="text-center mb-4">KARTU HASIL STUDI (KHS)</h2>

        <div class="card-body">
            <table style="width: 25em">
                <tr>
                    <th>NAMA</th>
                    <th>:</th>
                    <td>{{ $mahasiswa->Nama }}</td>
                </tr>

                <tr>
                    <th>NIM</th>
                    <th>:</th>
                    <td>{{ $mahasiswa->Nim }}</td>
                </tr>

                <tr>
                    <th>KELAS</th>
                    <th>:</th>
                    <td>{{ $mahasiswa->Kelas->nama_kelas }}</td>
                </tr>
            </table>

            <br><br>

            <table class="table table-bordered">
                <tr class="text-center">
                    <th>MATA KULIAH</th>
                    <th>SKS</th>
                    <th>SEMESTER</th>
                    <th>NILAI</th>
                </tr>
                @foreach ($mahasiswa->matakuliah as $nilai)
                    <tr class="text-center">
                        <td>{{ $nilai->Nama_Matkul }}</td>
                        <td>{{ $nilai->SKS }}</td>
                        <td>{{ $nilai->Semester }}</td>
                        <td>{{ $nilai->pivot->nilai }}</td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>
