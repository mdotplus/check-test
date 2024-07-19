<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contents = $request->all();
        return view('confirm', compact('contents'));
    }

    public function thanks(Request $request)
    {
        if ($request->input('next_step') === 'correct') {
            return redirect('/')->withInput();
        };

        $categoryId = Category::where('content', $request->get('content'))
            ->get('id')[0]['id'];
        $request->merge(['category_id' => $categoryId]);

        Contact::create($request->all());
        return view('thanks');
    }
}
