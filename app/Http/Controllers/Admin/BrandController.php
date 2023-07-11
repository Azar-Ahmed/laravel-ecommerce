<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DB;
use File;


class BrandController extends Controller
{
    public function Index()
    {
        $result['data'] = Brand::latest()->get();
        return view('admin.brand.index', $result);
    }

    public function Form($id)
    {
        $result = [];
        if ($id != 'add') {
            $arr = Brand::where('id', $id)->first();
            $result['name'] = $arr->name;
            $result['image'] = $arr->image;
            $result['id'] = $arr->id;
        } else {
            $result['name'] = '';
            $result['image'] = '';
            $result['id'] = 0;
        }
        return view('admin.brand.manage', $result);
    }

    public function Manage(Request $request)
    {
        if ($request->id > 0) {
            $image_validation = 'mimes:jpg,png,jpeg,gif,svg|max:2048';
        } else {
            $image_validation = 'required|mimes:jpg,png,jpeg,gif,svg|max:2048';
        }
        
        $request->validate([
            'name' => 'required',
            'image' => $image_validation,
        ]); 
    
        if ($request->id > 0) {
            $model = Brand::find($request->id);
            $message = "Brand Updated";
            if($request->hasfile('image')){
                $path = 'uploads/brand/'.$model->image;
                if($model->image != 'default.jpg'){
                    if(File::exists($path)){
                        File::delete($path);
                    }
                }
            } 
        } else {
            $model = new Brand();
            $message = "Brand Added";
        }

        if($request->hasfile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename  = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->image->move(public_path('uploads/brand/'), $fileNameToStore);
            $model->image = $fileNameToStore;
        }
       
        $model->name = $request->name;
        $model->save();          
        return redirect('admin/brand')->with('success_msg', $message);
    }

    public function Delete($id)
    {
        $model = Brand::find($id);
        if($model->image != 'default.jpg') {
              $path = 'uploads/brand/'.$model->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $model->delete(); 
        }
        $message = "Brand Deleted";

        return redirect('admin/brand')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Brand Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Brand Active";
        }
        $model = Brand::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/brand')->with('success_msg', $message);
        }
    }
}
