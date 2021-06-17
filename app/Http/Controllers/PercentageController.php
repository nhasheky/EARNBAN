<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Percentage;

class PercentageController extends Controller
{

    public function read(Request  $request)
    {
        $per=Percentage::first();
        return view('admin.percentage.read',compact('per'));
    }


    public function create()
    {
        return view('admin.percentage.create');
    }


    public function store(Request  $request)
    {

        $request->validate([
            'percentage'=>'required|string|max:255',
        ]);

        $store=new Percentage();
         
        $store->percentage = $request->percentage;

        $store->save();  

        return redirect('admin/percentage')->with('success','This percentage created successfully.');

    }


    public function edit($id)
    {

        $per=Percentage::where('id',$id)->first();
        return view('admin.percentage.edit',compact('per'));

    }


    public function update(Request $request)
    {

        $request->validate([
            'percentage'=>'required|string|max:255',
        ]);

        $update= Percentage::find($request->id);
         
        $update->percentage = $request->percentage;

        $update->save();  

        return redirect('admin/percentage')->with('success','This percentage updated successfully.');

    }


    public function destroy($id)
    {
        
        $per=Percentage::where('id',$id)->first();
        $per->delete();

        return back()->with('success','This percentage deleted successfully.');
    }






}
