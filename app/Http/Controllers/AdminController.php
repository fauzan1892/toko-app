<?php
/**
 * Codekop Toko Online
 * 
 * @link       https://www.codekop.com/
 * @version    1.0.1
 * @copyright  (c) 2021 
 * 
 * File      : AdminController.php
 * Web Name  : Toko Online
 * Developer : Fauzan Falah 
 * E-mail    : fauzancodekop@gmail.com / fauzan1892@codekop.com
 * 
 * 
**/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'title' => 'Admin Toko'
        ];
        return view('contents.admin.home', $data);
    }

    // produk
    public function produk(Request $request)
    {
        $reqsearch = $request->get('search');  
        $produkdb = Produk::leftJoin('kategori','produk.id_kategori','=','kategori.id')
            ->select('kategori.nama_kategori','produk.*')
            ->when($reqsearch, function($query, $reqsearch){
                $search = '%'.$reqsearch.'%';
                return $query->whereRaw('nama_kategori like ? or nama_produk like ?', [
                        $search, $search
                    ]);
            });
        $data = [
            'title'     => 'Data Produk',
            'kategori'  => Kategori::All(),
            'produk'    => $produkdb->latest()->paginate(5),
            'request'   => $request
        ];
        return view('contents.admin.produk', $data);
    }

    public function edit_produk(Request $request)
    {
        $data = [
            'edit' => Produk::findOrFail($request->get('id')),
            'kategori' => Kategori::All(),
        ];
        return view('components.admin.produk.edit', $data);
    }

    // data proses produk 
    public function create_produk(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "id_kategori"   => "required",
            "gambar"        => 'required|file|max:2048',
            "nama_produk"   => "required",
            "deskripsi"     => "required",
            "harga_jual"    => "required",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with("failed", "Gagal Insert Data!");
        }
    
        $gambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
    
            // Cek ekstensi file
            $extension = $file->getClientOriginalExtension();
            $validExtensions = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
    
            if (!in_array(strtolower($extension), $validExtensions)) {
                return redirect()->back()->with("failed", "File bukan gambar yang valid! Ekstensi salah.");
            }
    
            // Validasi MIME type manual menggunakan finfo
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file->getPathname());
            finfo_close($finfo);
    
            $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!in_array($mimeType, $validMimeTypes)) {
                return redirect()->back()->with("failed", "File bukan gambar yang valid! MIME type salah.");
            }
    
            // Generate nama file unik
            $customName = 'produk_' . time() . '.' . $extension;
    
            // Simpan file
            $file->move(storage_path('app/public/gambar'), $customName);
            $gambar = $customName;
        }
    
        // Simpan data ke database
        Produk::create([
            'id_kategori'   => $request->get("id_kategori"),
            'gambar'        => $gambar,
            'nama_produk'   => $request->get("nama_produk"),
            'deskripsi'     => $request->get("deskripsi"),
            'harga_jual'    => $request->get("harga_jual"),
            'created_at'    => now(),
        ]);
    
        return redirect()->back()->with("success", "Berhasil Insert Data!");
    }

    public function update_produk(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "id"            => "required|exists:produk,id",
            "id_kategori"   => "required",
            "nama_produk"   => "required",
            "deskripsi"     => "required",
            "harga_jual"    => "required",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with("failed", "Gagal Update Data!");
        }
    
        $produkdb = Produk::findOrFail($request->get('id'));
        $gambar = $produkdb->gambar;
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
    
            // Cek ekstensi file
            $extension = $file->getClientOriginalExtension();
            $validExtensions = ['jpeg', 'png', 'jpg', 'gif', 'svg'];
    
            if (!in_array(strtolower($extension), $validExtensions)) {
                return redirect()->back()->with("failed", "File bukan gambar yang valid! Ekstensi salah.");
            }
    
            // Validasi MIME type manual menggunakan finfo
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $file->getPathname());
            finfo_close($finfo);
    
            $validMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!in_array($mimeType, $validMimeTypes)) {
                return redirect()->back()->with("failed", "File bukan gambar yang valid! MIME type salah.");
            }
    
            // Generate nama file unik
            $customName = 'produk_' . time() . '.' . $extension;
    
            // Simpan file
            $file->move(storage_path('app/public/gambar'), $customName);
            $gambar = $customName;
        }
    
        // Update data di database
        $produkdb->update([
            'id_kategori'   => $request->get("id_kategori"),
            'gambar'        => $gambar,
            'nama_produk'   => $request->get("nama_produk"),
            'deskripsi'     => $request->get("deskripsi"),
            'harga_jual'    => $request->get("harga_jual"),
            'updated_at'    => now(),
        ]);
    
        return redirect()->back()->with("success", "Berhasil Update Data Produk " . $request->get("nama_produk") . '!');
    }

    public function delete_produk(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with("success"," Berhasil Delete Data Produk ! ");
    }

    // kategori
    public function kategori(Request $request)
    {
        if(!empty($request->get('id'))){
            $edit = Kategori::findOrFail($request->get('id'));
        }
        else{
            $edit = '';
        }

        $data = [
            'title'     => 'Data Kategori',
            'kategori'  => Kategori::paginate(5),
            'edit'      => $edit,
            'request'   => $request
        ];
        return view('contents.admin.kategori', $data);
    }

    // data proses kategori
    public function create_kategori(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "nama_kategori" => "required",
        ]);
        if($validator->passes()) {
            Kategori::insert([
                'nama_kategori' => $request->get("nama_kategori"),
                'created_at'    => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with("success"," Berhasil Insert Data ! ");
        }
        else{
            return redirect()->back()->withErrors($validator)->with("failed"," Gagal Insert Data ! ");
        }
    }

    public function update_kategori(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "id"            => "required",
            "nama_kategori" => "required",
        ]);
        if($validator->passes()) {
            Kategori::findOrFail($request->get('id'))->update([
                'nama_kategori' => $request->get("nama_kategori"),
                'update_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with("success"," Berhasil Update Data ! ");
        }
        else{
            return redirect()->back()->withErrors($validator)->with("failed"," Gagal Update Data ! ");
        }
    }


    public function delete_kategori(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with("success"," Berhasil Delete Data ! ");
    }

    // profil
    public function profil(Request $request)
    {
        $data = [
            'title' => 'Data Produk',
            'edit' => User::findOrFail(auth()->user()->id),
            'request' => $request
        ];
        return view('contents.admin.profil', $data);
    }

    // data proses profil
    public function update_profil(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "name"                  => "required",
            "email"                 => "required",
            "password"              => "required|min:6",
            "password_confirmation" => "required|min:6",
        ]);

        if($validator->passes())
        {
            if($request->get("password") == $request->get("password_confirmation"))
            {
                User::findOrFail(auth()->user()->id)->update([
                    'name'          => $request->get("name"),
                    'email'         => $request->get("email"),
                    'phone'         => $request->get("phone"),
                    'address'       => $request->get("address"),
                    'password'      => Hash::make($request->get("password")),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);
                return redirect()->back()->with("success"," Berhasil Update Data ! ");
            }
            else{
                return redirect()->back()->with("failed","Confirm Password Tidak Sama !");
            }
        }
        else{
            return redirect()->back()->withErrors($validator)->with("failed"," Gagal Update Data ! ");
        }
    }
}
