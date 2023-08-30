@extends('layout.layout')
@section('title','Daftar Cabang')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Daftar minimarket cabang</span>
            </div>
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Nama Cabang
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($cabang as $cb)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$cb->nama_cabang}}</td>
                            <td>{{$cb->alamat}}</td>
                            <td>
                                <a href="{{url('/dashboard')}}/cabang/edit/{{$cb->id_cabang}}">
                                    <btn class="btn btn-primary">Edit</btn>
                                </a>
                                <btn class="hapusBtn btn btn-danger" idCabang="{{$cb->id_cabang}}">Hapus</btn>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{url('/dashboard')}}/cabang/tambah"><btn class="btn btn-success">Tambah </btn></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="module">
$('.DataTable tbody').on('click','.hapusBtn',function(a){
    a.preventDefault();
    let idCabang = $(this).closest('.hapusBtn').attr('idCabang');
    swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('cabang/hapus/'+idCabang).then(function(response){
                    console.log(response);
                    if(response.data.success){
                        swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }else{
                        swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }
                }).catch(function(error){
                    swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                //Refresh Halaman
                               
                            });
                });
            }
        });
});
$('.DataTable').DataTable();
</script>
@endsection