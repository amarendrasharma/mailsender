<?php

namespace App\Http\Controllers;

use App\Imports\TestImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UploadExcelController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('excel.import.create');
    }


    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'excel' => file
        // ]);
        // Excel::store(new UsersImport, $request->file('excel'));
        // Excel::queueImport(new TestImport, $request->file('excel'));
        (new TestImport)->import('users.xlsx', 'local', \Maatwebsite\Excel\Excel::XLSX);
        // Excel::import(new TestImport, $request->file('excel'));
        return "done";
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
