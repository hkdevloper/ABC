<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    // Function to View Company List
    public function viewCompanyList()
    {
        return view('pages.user.company.list');
    }

    //Function to view Company Details
    public function viewCompanyDetails()
    {
        return view('pages.user.company.detail');
    }
}
