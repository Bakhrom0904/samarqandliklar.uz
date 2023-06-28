<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts=Contact::orderBy('id','DESC')->paginate(10);
        return view('admin.dashboard',compact('contacts'));
    }
}
