<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\validated;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use DataTables;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

use App\Http\Requests\ProductRequest;


// use App\Http\Requests\SettingRequest;
use \Illuminate\Support\Str;

class ProductsControllar extends Controller
{

    use UploadImage;
    protected $Productmodel;

    public function __construct(Product $Product) {
        $this->Productmodel = $Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.Products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   


    public function get()
    {
        $data = Product::select('*')->with('category');
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                 return $btn = '
                        <a href="' . Route('dashboard.Products.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                     return;
                
            })

            ->addColumn('category_name', function ($row) {
                return  $row->category->translate(app()->getLocale())->title;
            })


            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            ->rawColumns(['action', 'title' , 'category_name'])
            ->make(true);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
         $categories = Category::all();
     
            return view('dashboard.Products.add' , compact('categories'));
        
        
    }
    public function store(ProductRequest $request, Product $product)
    {
        
        $validatedData = $request->validated();

        $product = Product::create($request->except('_token'));
        
        if ($request->has('image')) {
           $product->update(['image'=>$this->upload($request->image)]);
        }
       return redirect()->route('dashboard.Products.index');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $Product)
    {
         $categories = Category::all();
       return view('dashboard.Products.edit' , compact('Product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
         $Product->update($request->except('_token'));
         if ($request->has('image')) {
            $Product->update(['image'=>$this->upload($request->image)]);
         }
       return redirect()->route('dashboard.Products.edit' , $Product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete (Request $request)
    {

        if(is_numeric($request->id)){
           Product::where('id' , $request->id)->delete();
       }
       return redirect()->route('dashboard.Products.index');
    }
}