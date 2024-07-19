<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $categories = Category::all();

        $contacts = Contact::with('category')->paginate(7);
        $sort = $request->sort;

        return view('/admin', compact('categories', 'contacts', 'sort', 'request'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();

        $contacts = Contact::with('category')
            ->NameOrEmailSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category)
            ->DateSearch($request->date)
            ->paginate(7);
        $sort = $request->sort;

        return view('/admin', compact('categories', 'contacts', 'sort', 'request'));
    }
}
