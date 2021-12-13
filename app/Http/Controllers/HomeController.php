<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $reqsearch = $request->get('search');  
        $produkdb = Produk::leftJoin('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id')
                    ->select('tbl_kategori.nama_kategori','tbl_produk.*');
        $data = [
            'title'     => 'Toko Codekop',
            'kategori'  => Kategori::All(),
            'produk'    => $produkdb->latest()->paginate(8),
        ];
        return view('contents.frontend.home', $data);
    }

    public function kategori(Request $request, $id)
    {
        $edit = Kategori::findOrFail($id);
        $produkdb = Produk::leftJoin('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id')
                    ->select('tbl_kategori.nama_kategori','tbl_produk.*')->where('tbl_produk.id_kategori', $id);
        $data = [
            'title'     => $edit->nama_kategori,
            'kategori'  => Kategori::All(),
            'produk'    => $produkdb->latest()->paginate(8),
        ];
        return view('contents.frontend.kategori', $data);
    }

    public function search(Request $request)
    {
        $reqsearch = $request->get('keyword');  
        $produkdb = Produk::leftJoin('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id')
            ->select('tbl_kategori.nama_kategori','tbl_produk.*')
            ->when($reqsearch, function($query, $reqsearch){
                $search = '%'.$reqsearch.'%';
                return $query->whereRaw('nama_kategori like ? or nama_produk like ?', [
                        $search, $search
                    ]);
            });
        $data = [
            'title'     => 'Cari : '.$reqsearch,
            'kategori'  => Kategori::All(),
            'produk'    => $produkdb->latest()->paginate(8),
        ];
        return view('contents.frontend.kategori', $data);
    }

    public function produk(Request $request, $id)
    {
        $reqsearch = $request->get('keyword');  
        $produkdb = Produk::leftJoin('tbl_kategori','tbl_produk.id_kategori','=','tbl_kategori.id')
            ->select('tbl_kategori.nama_kategori','tbl_produk.*')->where('tbl_produk.id', $id)->first();

        if(!$produkdb){ abort('404'); }

        $data = [
            'title'     => $produkdb->nama_produk,
            'kategori'  => Kategori::All(),
            'edit'      => $produkdb,
        ];
        return view('contents.frontend.produk', $data);
    }

    public function redir_admin(){
        return redirect('admin');
    }

}
