<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;
use App\companies;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Support\Facades\DB;


class employeesController extends Controller
{
    public function index()
    {
        $companies = companies::all();
        $employees =DB::table('employees')
                ->join('companies', 'companies.id', '=', 'employees.company_id')
                ->select( 'employees.id_employees','employees.nama','employees.company_id', 'companies.nama_companies','employees.email')
                ->get();

        return view('employees.index',compact('employees','companies'));
    }


    public function postemployees(Request $request )
    {
        $request->validate([
            'nama' => 'required',
            'company_id' => 'required',
            'email' => 'required',
        ]);

        DB::table('employees')->insert([
            'nama' => $request->nama,
            'company_id' => $request->company_id,
            'email' => $request->email
        ]);
        return redirect('/employees')->with('toast_success', 'Data Berhasil Di Tambah');

    }
    public function updateemployees(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'company_id' => 'required',
            'email' => 'required',
        ]);

        $id = $request->id_employees;
        $nama = $request->nama;
        $company_id = $request->company_id;
        $email = $request->email;
        // dd($id,$nama,$company_id,$email);
        $save =  DB::table('employees')->where('id_employees', $id)->update([
                    
            'nama' => $nama,
            'company_id' => $company_id,
            'email' => $email
                ]);
        return redirect('/employees')->with('toast_success', 'Data Berhasil Di Update');


    }
    public function PostDeleteEmployees($id) 
    {
        // dd($id)
        $Delete2 = DB::table('employees')->where('id_employees',$id)->delete();
        
        return redirect('/employees')->with('toast_success', 'Data Berhasil Di Hapus');


    }
}
