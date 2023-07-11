<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use File;


class CategoryController extends Controller
{
    public function Index()
    {
        $result['data'] = Category::latest()->get();
        return view('admin.category.index', $result);
    }

    public function Form($id)
    {
        $result = [];
        if ($id != 'add') {
            $arr = Category::where('id', $id)->first();
            $result['cat_name'] = $arr->cat_name;
            $result['desc'] = $arr->desc;
            $result['image'] = $arr->image;
            $result['id'] = $arr->id;
        } else {
            $result['cat_name'] = '';
            $result['desc'] = '';
            $result['image'] = '';
            $result['id'] = 0;
        }
        return view('admin.category.manage', $result);
    }

    public function Manage(Request $request)
    {
        if ($request->id > 0) {
            $image_validation = 'mimes:jpg,png,jpeg,gif,svg|max:2048';
        } else {
            $image_validation = 'required|mimes:jpg,png,jpeg,gif,svg|max:2048';
        }
        
        $request->validate([
            'cat_name' => 'required',
            // 'desc' => 'required',
            'image' => $image_validation,
        ]); 
    
        if ($request->id > 0) {
            $model = Category::find($request->id);
            $message = "Category Updated";
            if($request->hasfile('image')){
                $path = 'uploads/category/'.$model->image;
                if($model->image != 'default.jpg'){
                    if(File::exists($path)){
                        File::delete($path);
                    }
                }
            } 
        } else {
            $model = new Category();
            $message = "Category Added";
        }

        if($request->hasfile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename  = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->image->move(public_path('uploads/category/'), $fileNameToStore);
            $model->image = $fileNameToStore;
        }
       
        $model->cat_name = $request->cat_name;
        $model->desc = $request->desc;
        $model->save();          
        return redirect('admin/category')->with('success_msg', $message);
    }

    public function Delete($id)
    {
        $model = Category::find($id);
        if($model->image != 'default.jpg') {
              $path = 'uploads/category/'.$model->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $model->delete(); 
        }
        $message = "Category Deleted";

        return redirect('admin/category')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Category Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Category Active";
        }
        $model = Category::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/category')->with('success_msg', $message);
        }
    }
}
