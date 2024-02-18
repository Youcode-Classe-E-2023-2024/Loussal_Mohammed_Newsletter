<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function store(Request $request, Newsletter $newsletter) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,newer'
        ]);

        if($validator->fails()) {
            return redirect()->route('newsletter.index')
                ->withErrors($validator)
                ->withInput();
        }

        Newsletter::create([
            'newer' => $request->email,
        ]);

        return redirect()->route('newsletter.index')->with('success', 'subscribed to newsletter successfully!');
    }


    public function drop($newsletter) {
        $newsletter->drop();

        redirect('newsletter.index')->with('success', 'newsletter dropped successfully!');
    }
}
