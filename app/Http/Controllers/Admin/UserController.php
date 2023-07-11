<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function Index()
    {
        $result['data'] = User::latest()->get();
        return view('admin.user.index', $result);
    }

    public function Delete($id)
    {
        $model = User::find($id);
        $model->delete(); 
        $message = "User Deleted";

        return redirect('admin/user')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "User Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "User Active";
        }
        $model = User::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/user')->with('success_msg', $message);
        }
    }
}
