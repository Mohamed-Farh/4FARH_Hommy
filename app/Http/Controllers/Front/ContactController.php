<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Social;

class ContactController extends Controller
{


    //----------------- Show contact In The Website  ------------------
    public function home_contact()
    {
        $contacts= Social::orderBy('id', 'desc')->get();

        return view('includes.frontpages.contact',compact('contacts'));
    }

    public function send_message(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name'      => 'required',
                'email'     => 'required|email',
                'mobile'    => 'nullable',
                'subject'   => 'required|min:5',
                'message'   => 'required|min:10',
            ]);
            if ($validation->fails()){
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $data['name']       = $request->name;
            $data['email']      = $request->email;
            $data['mobile']     = $request->mobile;
            $data['subject']    = $request->subject;
            $data['message']    = $request->message;

            Contact::create($data);

            toastr()->success(trans('homy_trans.Message_Sent_Successfully'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function messages_index()
    {
        $messages = Contact::all();

        return view('pages.admin.messages.index', compact('messages'));
    }
    public function messages_delete(Request $request)
    {
        $messages = Contact::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }

    public function messages_read(Request $request)
    {
        try {
            $message = Contact::findOrFail($request->id);

            $message->update(['status' => 1]);
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
