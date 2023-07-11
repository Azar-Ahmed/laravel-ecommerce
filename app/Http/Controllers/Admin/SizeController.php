<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function Index()
    {
        $result['data'] = Size::latest()->get();
        return view('admin.size.index', $result);
    }

    public function Form($id)
    {
        $result = [];
        if ($id != 'add') {
            $arr = Size::where('id', $id)->first();
            $result['name'] = $arr->name;
            $result['id'] = $arr->id;
        } else {
            $result['name'] = '';
            $result['id'] = 0;
        }
        return view('admin.size.manage', $result);
    }

    public function Manage(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]); 
    
        if ($request->id > 0) {
            $model = Size::find($request->id);
            $message = "Size Updated";
        } else {
            $model = new Size();
            $message = "Size Added";
        }

    
       
        $model->name = $request->name;
        $model->save();          
        return redirect('admin/size')->with('success_msg', $message);
    }

    public function Delete($id)
    {
        $model = Size::find($id);
        $model->delete(); 
        $message = "Size Deleted";

        return redirect('admin/size')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Size Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Size Active";
        }
        $model = Size::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/size')->with('success_msg', $message);
        }
    }
}
