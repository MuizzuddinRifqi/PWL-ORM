<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswas = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        return view('mahasiswas.index', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $kelas = Kelas::all(); // Mengambil semua isi tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }


    public function store(Request $request)
    {
        // Melakukan Validasi Data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'TTL' => 'required'
        ]);

        $mahasiswas = new Mahasiswa;
        $mahasiswas->Nim = $request->get('Nim');
        $mahasiswas->Nama = $request->get('Nama');
        $mahasiswas->kelas_id = $request->get('Kelas');
        $mahasiswas->Jurusan = $request->get('Jurusan');
        $mahasiswas->No_Handphone = $request->get('No_Handphone');
        $mahasiswas->Email = $request->get('Email');
        $mahasiswas->TTL = $request->get('TTL');
        $mahasiswas->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('Kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        // // Eloquent Function for insert data
        // Mahasiswa::create($request->all());

        // If Success, will back to Home Page
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }


    public function show(string $Nim)
    {
        // Show detail data with find NIM
        // code sebelum dibuat relasi --> $Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        return view('mahasiswas.detail', ['Mahasiswa' => $Mahasiswa]);
    }


    public function edit(string $Nim)
    {
        // Show detail data find with NIM for Editing
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all(); // Mendapatkan data dari tabel kelas
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }


    public function update(Request $request, $Nim)
    {
        // Melakukan Validasi Data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'TTL' => 'required'
        ]);

        $Mahasiswa = Mahasiswa::find($Nim);

        
        if($Mahasiswa->featured_image && file_exists(storage_path('app/public/'. $Mahasiswa->featured_image))){
            Storage::delete('public/'. $Mahasiswa->Foto);
        }
        $image_name = $request->file('Foto')->store('images', 'public');
        $Mahasiswa->Foto = $image_name;
        
        Mahasiswa::where('Nim', $Nim)->update([
            'Nim' => $request->get('Nim'),
            'Nama' => $request->get('Nama'),
            'Foto' => $image_name,
            'Jurusan' => $request->get('Jurusan'),
            'No_Handphone' => $request->get('No_Handphone'),
            'Email' => $request->get('Email'),
            'TTL' => $request->get('TTL'),
            'kelas_id' => $request->get('Kelas'),
        ]);
        

        // jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }


    public function destroy($Nim)
    {
        // Mahasiswa::find('Nim', $Nim) -> delete();
        // return redirect() -> route('mahasiswas.index') -> with('success', 'Mahasiswa Berhasil Dihapus');

        Mahasiswa::where('Nim', $Nim)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function nilai($Nim){
        $mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->find($Nim);
        return view('mahasiswas.nilai', compact('mahasiswa'));        
    }

    public function print_pdf($Nim){
        $mahasiswa = Mahasiswa::where('nim', $Nim)->first();
        $pdf = PDF::loadview('mahasiswas.print_pdf', compact('mahasiswa'));
        return $pdf->stream('Kartu Nilai - '.$mahasiswa->nim.'.pdf');
    }
}
