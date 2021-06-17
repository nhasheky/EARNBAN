<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{

    public function read(Request  $request)
    {
        if($request->search){
            $categories=Category::where('category','like','%'.$request->search.'%')->orderby('id','desc')->get();
        }else{
            $categories=Category::orderby('id','desc')->get();
        }

        return view('admin.category.read',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request  $request)
    {

        $request->validate([
            'category'=>'required|string|max:255',
        ]);

        $store=new Category();
         
        $store->category = $request->category;

        $store->save();  

        return back()->with('success','This category created successfully.');

    }


    public function edit($id)
    {

        $category=Category::where('id',$id)->first();
       
        return view('admin.category.edit',compact('category'));

    }


    public function update(Request $request)
    {

        $request->validate([
            'category'=>'required|string|max:255',
        ]);

        $update=Category::where('id',$request->id)->first();
         
        $update->category = $request->category;

        $update->save();  

        return back()->with('success','This category updated successfully.');

    }


    public function destroy($id)
    {
        
        $category=Category::where('id',$id)->first();
        $category->delete();

        return back()->with('success','This category deleted successfully.');
    }






}
