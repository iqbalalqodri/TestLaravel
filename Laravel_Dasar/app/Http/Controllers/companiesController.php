<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\companies;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class companiesController extends Controller
{
    public function index()
    {
        // Alert::success('Success Title', 'Success Message');

        $companies = companies::all();
        // return back();
        return view('companies.index',compact('companies'));
    }

    public function postcompanies(Request $request )
    {
        $request->validate([
            'nama_companies' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:png|max:2048',
            'website' => 'required'
        ]);


        if($request->hasFile('logo')){
            $resorce       = $request->file('logo');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/storage/App/", $name);
            $save =  DB::table('companies')->insert([
                'nama_companies' => $request->nama_companies,
                'email' => $request->email,
                'logo' => $name,
                'website' => $request->website
                    ]);

                }
        return redirect('/companies')->with('toast_success', 'Data Berhasil Di Tambah');

    }
    public function updatecompanies(Request $request)
    {
        $request->validate([
            'nama_companies' => 'required',
            'email' => 'required',
            'logo' => 'required|image|mimes:png|max:2048',
            'website' => 'required'
        ]);

        if($request->hasFile('logo')){
            $id      = $request->companies_id;
            $resorce      = $request->file('logo');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() ."/public/storage/App/", $name);
            $save =  DB::table('companies')->where('id', $id)->update([
                'nama_companies' => $request->nama_companies,
                'email' => $request->email,
                'logo' => $name,
                'website' => $request->website
                    ]);

                }
        return redirect('/companies')->with('toast_success', 'Data Berhasil Di Update');
    }
    public function PostDeleteCompanies($id) 
    {
        $Delete = companies::find($id);
        $Delete->delete();
        return redirect('/companies')->with('toast_success', 'Data Berhasil Di Hapus');


    }
}
