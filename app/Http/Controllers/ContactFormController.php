<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function show() {
        return view('contact-form');
    } 

    public function send(ContactFormRequest $request) {
        return response()->json(['success' => __('Poprawnie wysłano formularz')], 200);
    }
}
