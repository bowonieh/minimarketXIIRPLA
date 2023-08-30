<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    //
    protected $model;
    public function __construct()
    {
        $this->model = new Perusahaan;
    }
    public function index()
    {
        //method ini akan menampilkan data perusahaan.
        $data = [
            'perusahaan' => $this->model->first()
        ];
        //echo json_encode($data);
        return view('perusahaan.index', $data);
    }

    public function edit()
    {
        //Halaman form untuk edit
        $data = [
            'perusahaan' => $this->model->first()
        ];
        return view('perusahaan.edit', $data);
    }
    public function simpan(Request $request)
    {
        $validate = $request->validate([
            'id_perusahaan' => ['required'],
            'nama_perusahaan' => ['required'],
            'alamat'           => ['required']
        ]);
        if ($validate) :
            Perusahaan::where('id_perusahaan', $request->get('id_perusahaan'))
                ->update($validate);
            return redirect('/dashboard/perusahaan')->with('success', 'Data Perusahaan berhasil di update');
        //endif;
        else :
            return redirect('/dashboard/perusahaan/edit')->with('error', 'Data Perusahaan gagal di edit');
        endif;
    }
}
