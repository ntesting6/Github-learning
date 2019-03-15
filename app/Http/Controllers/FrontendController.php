<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\lvproduct;
use Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }
	public function save_product(Request $request)
    {
		
		//dd($request);
		
		$this->validate($request, [
			'product_image' => 'required',
			'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		
		if($request->hasfile('product_image'))
         {

            foreach($request->file('product_image') as $image)
            {
                $pic_name = $image->getClientOriginalName();
				$name = time().'-'.$pic_name.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name); 
                $data[] = $name;  
            }
         }

		
		
        //$product = lvproduct::create($request->all())
		
		$lvproduct =  new lvproduct;
		 $lvproduct->title = $request->title;
        $lvproduct->description = $request->description;
        if ($request->hasFile('cover_image')) {
        $customer->cover_image = $name;
        }
        $customer->save();
		
		$product->image=json_encode($data);
		
		$product->save();
		
		
		//return back()->with('message','Record Saved Successfully');
    }
	
	public function product_list()
    {
		if(Auth::user())
		{
        $products = lvproduct::all();
		
		return view('product.product_list',compact('products'));
		}
		else{
			return view('restriction_message');
		}
		
    }
	
	public function edit_product($id)
    {
        $product = lvproduct::find($id);
		
		return view('product.edit_product',compact('product'));
		
    }
	
	public function update_product(Request $request,$id)
    {
       lvproduct::where('id',$id)->update(['title' => $request->input('title'),'description' => $request->input('description')]);
		
		return back()->with('message','Record Successfully Updated');
		
    }
	
	public function delete_product($id)
    {
       $product = lvproduct::find($id);
	   
	   $product->delete();
	   
		
		return back()->with('message','Record Successfully Deleted');
		
    }
	
	
	
}
