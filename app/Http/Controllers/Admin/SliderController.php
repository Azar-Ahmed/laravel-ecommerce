<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;
use File;

class SliderController extends Controller
{
    public function Index()
    {
        $result['data'] = Slider::latest()->get();
        return view('admin.slider.index', $result);
    }

    public function Form($id)
    {
        $result = [];
        if ($id != 'add') {
            $arr = Slider::where('id', $id)->first();
            $result['dynamic_link'] = $arr->dynamic_link;
            $result['image'] = $arr->image;
            $result['id'] = $arr->id;
        } else {
            $result['dynamic_link'] = '';
            $result['image'] = '';
            $result['id'] = 0;
        }
        return view('admin.slider.manage', $result);
    }

    public function Manage(Request $request)
    {
        if ($request->id > 0) {
            $image_validation = 'mimes:jpg,png,jpeg,gif,svg|max:2048';
        } else {
            $image_validation = 'required|mimes:jpg,png,jpeg,gif,svg|max:2048';
        }
        
        $request->validate([
            'dynamic_link' => 'required',
            'image' => $image_validation,
        ]); 
    
        if ($request->id > 0) {
            $model = Slider::find($request->id);
            $message = "Slider Updated";
            if($request->hasfile('image')){
                $path = 'uploads/slider/'.$model->image;
                if($model->image != 'default.jpg'){
                    if(File::exists($path)){
                        File::delete($path);
                    }
                }
            } 
        } else {
            $model = new Slider();
            $message = "Slider Added";
        }

        if($request->hasfile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename  = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $request->image->move(public_path('uploads/slider/'), $fileNameToStore);
            $model->image = $fileNameToStore;
        }
       
        $model->dynamic_link = $request->dynamic_link;
        $model->save();          
        return redirect('admin/slider')->with('success_msg', $message);
    }

    public function Delete($id)
    {
        $model = Slider::find($id);
        if($model->image != 'default.jpg') {
              $path = 'uploads/slider/'.$model->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $model->delete(); 
        }
        $message = "Slider Deleted";

        return redirect('admin/slider')->with('success_msg', $message);
    }

    public function Status($status, $id)
    {
        if ($status == "deactive") {
            $status = '0';
            $message = "Slider Deactive";

        } elseif($status == "active") {
            $status = '1';
            $message = "Slider Active";
        }
        $model = Slider::where('id', $id)->first();
        if ($model != null) {
            $model->status = $status;
            $model->save();
            return redirect('admin/slider')->with('success_msg', $message);
        }
    }
}
