<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactFrontendRequest;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact(){
        return view('frontend.contact');
    }

    public function store(StoreContactFrontendRequest $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        Alert::success('تم بنجاح', 'تم إرسال الرسالة بنجاح، سنتواصل معك قريباً');

        return redirect()->back();
    }
}
