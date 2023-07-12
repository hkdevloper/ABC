<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Function to view All Companies
    public function viewCompanies(){
        return view('pages.admin.company.view_all');
    }

    // Function to view Add Company Form
    public function viewAddCompany(){
        return view('pages.admin.company.add');
    }

    // Function to view Edit Company Form
    public function viewEditCompany(){
        return view('pages.admin.company.edit');
    }
}
