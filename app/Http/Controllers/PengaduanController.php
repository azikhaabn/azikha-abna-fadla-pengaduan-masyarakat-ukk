<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'laporan' => 'required',
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $pengaduan = new Pengaduan([
        //     'nama' => $request->get('nama'),
        //     'laporan' => $request->get('laporan'),
        //     'photo' => $request->get('photo'),
        //     'status' => $request->get('status'),
        //     'response' => $request->get('response'),
        // ]);

        $pengaduan = Pengaduan::create($request->all());
  
        if ($request->hasFile('photo')) {
            $request->file('photo')->move('foto/', $request->file('photo')->getClientOriginalName());
            $pengaduan->photo = $request->file('photo')->getClientOriginalName();
            $pengaduan->save();
        }


        // $pengaduan->save();
        // Pengaduan::create($pengaduan);

        return redirect('/pengaduan')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function edit($id)
    {
        $pengaduan = DB::table('pengaduan')->where('id', $id)->get();
        return view('pengaduan.edit', ['pengaduan' => $pengaduan]);
    }

    public function update(Request $request)
    {
        // var_dump($request->id);
        // die();
        DB::table('pengaduan')->where('id', $request->id)->update([
            'status' => $request->status,
            'response' => $request->response
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pengaduan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('pengaduan')->where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/pengaduan');
    }

    public function exportPDF() {
       
        $pengaduan = Pengaduan::all();
  
        $pdf = PDF::loadView('pengaduan_pdf', ['pengaduan' => $pengaduan]);
        
        return $pdf->download('pengaduan.pdf');
        
      }

      public function datalaporan(Request $request)
      {
          if(isset($request->month)&&isset($request->status)){
              $pengaduan = Pengaduan::whereMonth('created_at', $request->month)->where('status', $request->status)->get();
          }elseif(isset($request->month)&&!isset($request->status)){
              $pengaduan = Pengaduan::whereMonth('created_at', $request->month)->get();
          }
          elseif(!isset($request->month)&&isset($request->status)){
              $pengaduan = Pengaduan::where('status', $request->status)->get();
          }
          elseif(!isset($request->month)&&!isset($request->status)){
              $pengaduan = Pengaduan::get();
          }
          return view('Admin.datalaporan', ['pengaduan' => $pengaduan]);
      }

      public function belumdiproses(Request $request)  
      {
        $belumDiproses = Pengaduan::where('status' , 'Belum Diproses')->get();
        return view('Admin.Belum',compact('belumDiproses'));
      }

      public function diproses(Request $request)  
      {
        $Diproses = Pengaduan::where('status' , 'Sedang Diproses')->get();
        return view('Admin.diproses',compact('Diproses'));
      }

      public function selesai(Request $request)  
      {
        $Selesai = Pengaduan::where('status' , 'Selesai')->get();
        return view('Admin.selesai',compact('Selesai'));
      }
  
}
