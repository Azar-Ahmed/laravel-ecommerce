<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductMultipleImage;
use DB;
use File;

class ProductController extends Controller
{
    public function Index()
    {
     $result['data'] = Product::join('categories', 'products.cat_id', '=', 'categories.id')
                                     ->latest()->get(['products.*', 'categories.cat_name']);

     
     return view('admin.product.index', $result);
    }
 
    public function Form($id){
       $result = [];
       if ($id != 'add') {
           $arr = Product::where('id', $id)->first();
           $result['product_name'] = $arr->product_name;
           $result['cat_id'] = $arr->cat_id;
           $result['sub_cat_id'] = $arr->sub_cat_id;
           $result['color_id'] = $arr->color_id;
           $result['size_id'] = $arr->size_id;
           $result['brand_id'] = $arr->brand_id;
           $result['short_desc'] = $arr->short_desc;
           $result['long_desc'] = $arr->long_desc;
           $result['qty'] = $arr->qty;
           $result['features'] = $arr->features;
           $result['mrp'] = $arr->mrp;
           $result['price'] = $arr->price;
           $result['discount'] = $arr->discount;
           $result['cover_image'] = $arr->cover_image;
           $result['sku'] = $arr->sku;
           $result['id'] = $arr->id;
       } else {
           $result['product_name'] = '';
           $result['cat_id'] = '';
           $result['sub_cat_id'] = '';
           $result['color_id'] = '';
           $result['size_id'] = '';
           $result['brand_id'] = '';
           $result['short_desc'] = '';
           $result['long_desc'] = '';
           $result['qty'] = '';
           $result['features'] = '';
           $result['mrp'] = '';
           $result['price'] = '';
           $result['discount'] = '';
           $result['cover_image'] = '';
           $result['sku'] = '';
           $result['id'] = 0;
       
       }
       $result['category'] = DB::table('categories')->where('status' , 1)->latest()->get();
       $result['sub_category'] = DB::table('sub_categories')->where('status' , 1)->latest()->get();
       $result['color'] = DB::table('colors')->where('status' , 1)->latest()->get();
       $result['size'] = DB::table('sizes')->where('status' , 1)->latest()->get();
       $result['brand'] = DB::table('brands')->where('status' , 1)->latest()->get();
       $result['multiple_img'] = DB::table('product_multiple_images')->where('product_id', $id)->get();

       return view('admin.product.manage', $result);
 
   }
 
   public function Manage(Request $request)
   {   
    // dd($request);
            if ($request->id > 0) {
                $image_validation = 'mimes:jpg,png,jpeg,gif,svg|max:2048';
            } else {
                $image_validation = 'required|mimes:jpg,png,jpeg,gif,svg|max:2048';
            }

           $request->validate([
               'product_name' => 'required',
               'cat_id' => 'required',
               'sub_cat_id' => 'required',
               'color_id' => 'required',
               'size_id' => 'required',
               'brand_id' => 'required',
               'short_desc' => 'required',
               'qty' => 'required',
               'features' => 'required',
               'mrp' => 'required',
               'price' => 'required',
               'discount' => 'required',
               'image' => $image_validation,

           ]); 
               
           if ($request->id > 0) {
               $model = Product::find($request->id);
               $msg = "Product Updated Successfully";
               if($request->hasfile('image')){
                    $path = 'uploads/product/'.$model->image;
                    if($model->image != 'default.jpg'){
                        if(File::exists($path)){
                            File::delete($path);
                        }
                    }
                } 
           } else {
               $model = new Product();
               $msg = "Product Submitted Successfully";
           }

           if($request->hasfile('image'))
           {
               $filenameWithExt = $request->file('image')->getClientOriginalName();
               $filename  = pathinfo($filenameWithExt, PATHINFO_FILENAME);
               $extension = $request->file('image')->getClientOriginalExtension();
               $fileNameToStore = $filename . '_' . time() . '.' . $extension;
               $request->image->move(public_path('uploads/product/'), $fileNameToStore);
               $model->cover_image = $fileNameToStore;
           }
           $randomNumber = random_int(10000, 99999);

           $model->product_name = $request->product_name;
           $model->cat_id = $request->cat_id;
           $model->sub_cat_id = $request->sub_cat_id;
           $model->color_id = $request->color_id;
           $model->size_id = $request->size_id;
           $model->brand_id = $request->brand_id;
           $model->short_desc = $request->short_desc;
           $model->long_desc = $request->long_desc;
           $model->qty = $request->qty;
           $model->features = $request->features;
           $model->mrp = $request->mrp;
           $model->price = $request->price;
           $model->discount = $request->discount;
           $model->sku = $request->sku;
           $model->slug = $randomNumber;

          
           if($model->save()){
             $data = Product::where('slug', $randomNumber)->first();
             if($request->hasFile('image_url')){
                foreach($request->file('image_url') as $file)
                {
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'multipleImage'.rand(000000,999999).'.'.$extension;
                    $file->move('uploads/product/multiple_img/',$filename); 
                    $imgData = $filename;  
                
                    $multiple_img = new ProductMultipleImage();
                    $multiple_img->product_id = $data->id;
                    $multiple_img->image_url = $imgData;
                    $multiple_img->save();
                }
            }
           }
           return redirect('/admin/product')->with('success_msg', $msg);
   }
 
  
   public function Delete($id)
    {
        $model = Product::find($id);
        if($model->image != 'default.jpg') {
              $path = 'uploads/product/'.$model->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $model->delete(); 
        }
        $message = "Product Deleted";

        return redirect('admin/product')->with('success_msg', $message);
    }

 
   public function Status($status, $id)
   {
       if ($status == "deactive") {
           $status = '0';
           $message = "Product Deactive";
 
       } elseif($status == "active") {
           $status = '1';
           $message = "Product Active";
       }
       $model = Product::where('id', $id)->first();
       if ($model != null) {
           $model->status = $status;
           $model->save();
           return redirect('admin/product')->with('success_msg', $message);
       }
   }


   public function DeleteMultipleImage(Request $request)
   {
     $Media = ProductMultipleImage::find($request->image_id);
       $path = 'uploads/product/multiple_img/'.$Media->image_url;
         if(File::exists($path))
         {
             File::delete($path);
         }
         $Media->delete(); 
     $message = "Image Deleted";

     return response()->json(['Status' => 200, 'Message' => $message]);
   }
}
