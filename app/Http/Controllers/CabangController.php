<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    //
    public function index(){
        //Menampilkan list daftar cabang
        $data = [
            'cabang' => Cabang::all()
        ];
        return view('cabang.index',$data);
    }
    public function tambah(){
        return view('cabang.tambah');
    }
    //Methods for tambah dan edit 
    public function simpan(Request $request){
        $validate = $request->validate([
            'nama_cabang'   => ['required'],
            'kode_cabang'   => ['required'],
            'alamat'        => ['required'],
            'penanggung_jawab' => ['required'] 
        ]);
        
        //Check Validasi
        if($validate):
            if($request->input('id_cabang') !== null):
                //Update
                $dataUpdate = Cabang::where('id_cabang',$request->input('id_cabang'))
                                ->update($validate);
                if($dataUpdate):
                    return redirect('/dashboard/cabang')->with('success','Data cabang baru berhasil diupdate');
                else:
                    return redirect('/dashboard/tambah')->with('error','Data cabang baru Gagal diupdate');
                endif;
            else:
                //Insert
                $validate['id_perusahaan'] = 1;
                $dataInsert = Cabang::create($validate);
                if($dataInsert):
                    return redirect('/dashboard/cabang')->with('success','Data cabang baru berhasil ditambah');
                else:
                   return redirect('/dashboard/tambah')->with('error','Data cabang baru Gagal ditambah');
                endif;

            endif;
        endif;
    }
    public function edit(Request $request){
        //Get Id
        $data = [
         'cabang' =>   Cabang::where('id_cabang',$request->id)
                        ->first()
        ];
        return view('cabang.edit',$data);
    }
    public function hapus(Cabang $cabang, Request $request){
        $id_cabang = $request->id;
        //Hapus 
        $aksi = $cabang->where('id_cabang',$id_cabang)->delete();
        if($aksi):
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data cabang berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}
