<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ModalController extends Controller
{
     public function modal(Request $request)
    {
        $contact = Contact::with('category')->find(intval($request->id));
        return view('modal', compact('contact'));
    }
}
