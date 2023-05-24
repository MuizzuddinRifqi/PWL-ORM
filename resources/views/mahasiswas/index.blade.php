@extends('mahasiswas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2 d-flex justify-content-between mt-3">
                <div>
                    <a class="btn btn-success" href="{{ route('mahasiswas.create') }}">Input Mahasiswa</a>

                </div>
                <form class="d-flex" role="search" method="GET" action="/search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>


        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>NO HANDPHONE</th>
            <th>EMAIL</th>
            <th>TTL</th>
            <th width="280px">Action</th>
        </tr>

        @php $no = 1; @endphp
        @foreach ($posts as $Mahasiswa)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $Mahasiswa->Nim }}</td>
                <td>{{ $Mahasiswa->Nama }}</td>
                <td>{{ $Mahasiswa->Kelas->nama_kelas }}</td>
                <td>{{ $Mahasiswa->Jurusan }}</td>
                <td>{{ $Mahasiswa->No_Handphone }}</td>
                <td>{{ $Mahasiswa->Email }}</td>
                <td>{{ $Mahasiswa->TTL }}</td>


                <td>
                    <form action="{{ route('mahasiswas.destroy', $Mahasiswa->Nim) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswas.show', $Mahasiswa->Nim) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $Mahasiswa->Nim) }}">Edit</a>

                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}
@endsection
