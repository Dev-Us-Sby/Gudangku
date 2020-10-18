<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'mimes:xlsx,xls,csv'
        ]);

        $path = $request->file('file')->store('imported_users');

        Excel::import(new UsersImport, $path);

        return redirect()->back()->with('success', 'Data imported successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users-list' . date('Ymd') . '.xlsx');
    }
}
