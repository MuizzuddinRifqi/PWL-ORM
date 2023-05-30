@extends('mahasiswas.layout')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 27rem;">
                <div class="card-header">Edit Mahasiswa</div>


                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>There were some problems with your input. <br><br>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswas.update', $Mahasiswa->Nim) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="Nim">NIM</label>
                            <input type="text" name="Nim" class="form-control" id="Nim"
                                value="{{ $Mahasiswa->Nim }}" aria-describedby="Nim">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Nama">Nama</label>
                            <input type="text" name="Nama" class="form-control" id="Nama"
                                value="{{ $Mahasiswa->Nama }}" ariadescribedby="Nama">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Foto">Foto</label>
                            <input type="file" name="Foto" class="form-control" id="Foto"
                                value="{{ $Mahasiswa->Foto }}" ariadescribedby="Foto" accept="image/*">

                                <div class="mt-3" >
                                    <img width="100px" height="100px" src="{{ asset('storage/' . $Mahasiswa->Foto) }}"
                                        style="object-fit: cover">
                                </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Kelas">Kelas</label>
                            <select name="Kelas" class="form-control">
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}" {{ $Mahasiswa->Kelas->nama_kelas == $kls->nama_kelas ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
                                @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <label for="Jurusan">Jurusan</label>
                            <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan"
                                value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan">
                        </div>

                        <div class="form-group mb-3">
                            <label for="No_Handphone">No_Handphone</label>
                            <input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone"
                                value="{{ $Mahasiswa->No_Handphone }}" ariadescribedby="No_Handphone">
                        </div>

                        <div class="form-group mb-3">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" class="form-control" id="Email"
                                value="{{ $Mahasiswa->Email }}" ariadescribedby="Email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="TTL">TTL</label>
                            <input type="date" name="TTL" class="form-control" id="TTL"
                                value="{{ $Mahasiswa->TTL }}" ariadescribedby="TTL">
                        </div>

                        <a class="btn btn-success" href="{{ route('mahasiswas.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
