<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

use DB;
use File;


class ColorController extends Controller
{
    public function Index()
    {
        $result['data'] = Color::latest()->get();
        return view('admin.color.index', $result);
    }

    public function Form($id)
    {
        $result = [];
        if ($id != 'add') {
            $arr = Color::where('id', $id)->first();
            $result['name'] = $arr->name;
            $result['id'] = $arr->id;
        } else {
            $result['name'] = '';
            $result['id'] = 0;
        }
        return view('admin.color.manage', $result);
    }

    public function Manage(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]); 
    
        if ($request->id > 0) {
            $model = Color::find($request->id);
            $message = "Color Updated";
        } else {
            $model = new Color();
            $message = "Color Added";
        }

    
       
        $model->name = $request->name;
        $model->save();          
        return redirect('admin/color')->with('success_msg', $message);
    }

    public function Delete($id)
    {
        $model = Color::find($id);
        $model->delete(); 
        $message = "Color Deleted";

        return redirect('admin/color')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Color Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Color Active";
        }
        $model = Color::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/color')->with('success_msg', $message);
        }
    }
}
