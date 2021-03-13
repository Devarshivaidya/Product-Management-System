<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->get();
        if($request->ajax())
        {
            
            return Datatables::of($products)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = ' <a class="btn btn-info" style="spacing:15px" href="/products/'.$row->id.'">Show</a>';
                $btn .='<a class="btn btn-primary" style="spacing:15px" href="/products/'.$row->id.'/edit">Edit</a>';
                $btn .= '<a class="btn btn-danger" style="spacing:15px" href="/products/'.$row->id.'/delete">Delete</a>';
               
                 return $btn;
                 })
           ->addColumn('image', function($row){
            $image = '<img src="/storage/'.$row->image.'" height="250px"  width="250px">';

           
             return $image;
         })
        ->rawColumns(['action','image'])

         ->make(true);
            
        }
        return view('products.index',compact('products'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

         
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function search(Request $request)
    {
        $users = DB::table('products')->get();

        return view('products.index', ['products' => $users]);
        }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image'  => 'required',
        ]);
        $product = new Product(); 
        $image = $request->image->store('');
        $product->name = $request->get('name');
        $product->detail = $request->get('detail');
        $product->image = $image;
        // Product::create($product);
        $product->save();
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
