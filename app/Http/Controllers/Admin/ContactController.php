<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Index()
    {
        $result['data'] = Contact::latest()->get();
        return view('admin.contact.index', $result);
    }

    public function Delete($id)
    {
        $model = Contact::find($id);
        $model->delete(); 
        $message = "Contact Deleted";

        return redirect('admin/contact')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Contact Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Contact Active";
        }
        $model = Contact::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/contact')->with('success_msg', $message);
        }
    }
}
