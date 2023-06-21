<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    function show(){
        $data['menufood'] = Menu::all();
        return view('menufood',$data);
    }

    function detail(){
        $data['menufood'] = Menu::all();
        return view('detail',$data);
    }


    function view(){
        $data['menufood'] = Menu::all();
        return view('tampilan',$data);
    }


    function checkout(){
        $data['menufood'] = Menu::all();
        return view('checkout',$data);
    }


    function add(){
        // $data['menufood'] = Menu::first();
        $data = [
            'action' => url('menufood/create'),
            'menufood' => (object)[
                'nama_menu' => '',
                'harga_menu' => '',
                'foto' => '',
    



            ],
        ];

        return view('formmenufood',$data);
    }
    function create(Request $req){
        $this->validate($req,[
            // 'nama_menu'=> 'required',
            // 'harga_menu'=> 'required',
            // 'foto'=> 'required',
        
        ]);
    Menu::create([
        'nama_menu' => $req->nama_menu,
        'harga_menu' => $req->harga_menu,
        'foto'=> $req->file('foto')->store('foto')
    ]);
    return redirect('menufood');
    }
    
    function delete($id){
        $menufood = Menu::where('id' ,$id)->first();
        $menufood->delete();
        Storage::delete($menufood->foto);
        return redirect('menufood');
    }
    function edit($id){
        $data['menufood'] = Menu::find($id);
        $data['action'] = url('menufood/update').'/'.$data['menufood']->id;
        $data['tombol'] = 'update';
        return view('formmenufood',$data);
      }

      function update(request $req){
        // $this->validate($req,[
        //     'tittle'=> 'required|numeric',
        // ]);
        if($req->file('foto')){
            $file = $req->file('foto')->store('foto');
        }else{
            $file= DB:: row('foto');
        }
        Menu::where('id',$req->id)->update([
            'nama_menu' =>$req->nama_menu,
            'harga_menu' => $req->harga_menu,
            'foto' => $file,

        ]);
        return redirect('menufood');
      }

}
