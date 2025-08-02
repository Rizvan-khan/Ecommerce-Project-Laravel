<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function dashboard()
    {
        return view('admin.dashboard');
    }

     public function category()
    {
        return view('admin.category.add-category');
    }

     public function allcategory()
    {
        return view('admin.category.all-category');
    }

     public function editcategory()
    {
        return view('admin.category.edit-category');
    }
}
