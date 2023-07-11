<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
use File;


class SubCategoryController extends Controller
{
   public function Index()
   {
    $result['data'] = SubCategory::join('categories', 'sub_categories.cat_id', '=', 'categories.id')
                                    ->latest()->get(['sub_categories.*', 'categories.cat_name']);

    return view('admin.sub_category.index', $result);
   }

   public function Form($id){
      $result = [];
      if ($id != 'add') {
          $arr = SubCategory::where('id', $id)->first();
          $result['cat_id'] = $arr->cat_id;
          $result['sub_cat_name'] = $arr->sub_cat_name;
          $result['desc'] = $arr->desc;
          $result['id'] = $arr->id;
      } else {
          $result['cat_id'] = '';
          $result['sub_cat_name'] = '';
          $result['desc'] = '';
          $result['id'] = 0;
      
      }
      $result['category'] = DB::table('categories')->where('status' , 1)->latest()->get();

      return view('admin.sub_category.manage', $result);

  }

  public function Manage(Request $request)
  {   
          $request->validate([
              'cat_id' => 'required',
              'sub_cat_name' => 'required',
          ]); 
              
          if ($request->id > 0) {
              $model = SubCategory::find($request->id);
              $msg = "Sub Category Updated Successfully";
          } else {
              $model = new SubCategory();
              $msg = "Sub Category Submitted Successfully";
          }

          
          $model->cat_id = $request->cat_id;
          $model->sub_cat_name = $request->sub_cat_name;
          $model->desc = $request->desc;
         
          $model->save();
          return redirect('/admin/sub-category')->with('success_msg', $msg);
  }

  public function Delete($id)
  {
      $data = SubCategory::find($id);
      $data->delete(); 
      $message = "Sub Category Deleted";
      return redirect('/admin/sub-category')->with('success_msg', $message);
  }


  public function Status($status, $id)
  {
      if ($status == "deactive") {
          $status = '0';
          $message = "Sub Category Deactive";

      } elseif($status == "active") {
          $status = '1';
          $message = "Sub Category Active";
      }
      $model = SubCategory::where('id', $id)->first();
      if ($model != null) {
          $model->status = $status;
          $model->save();
          return redirect('admin/sub-category')->with('success_msg', $message);
      }
  }
}
