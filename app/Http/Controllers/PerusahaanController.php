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
    public function index(){
        //method ini akan menampilkan data perusahaan.
        $data = [
            'perusahaan' => $this->model->first()
        ];
        echo json_encode($data);
        //return view('perusahaan.index',$data);
    }

    public function edit(){
        //Halaman form untuk edit
        $data = [
            'perusahaan' => $this->model->first()
        ];
        return view('perusahaan.edit',$data);
    }
}
