<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Product;

use App\Http\Trait\UploadImage;

use App\Http\Requests\PackageRequest;

use DataTables;

class PackagesControllar extends Controller
{
    use UploadImage;
    protected $Packagemodel;

    public function __construct(Package $Package) {
        $this->Packagemodel = $Package;
    }

    public function index()
    {
       return view('dashboard.Packages.index');
    }

    public function create(Request $request)
    {
        $products = Product::all();
        return view('dashboard.Packages.add' , compact('products'));
    }


    public function store(PackageRequest $request)
    {   
        // explode(',', $string);

        $validatedData = $request->validated();

        $Package = Package::create($request->except('_token'));
        
        if ($request->has('image')) {
           $Package->update(['image'=>$this->upload($request->image)]);
        }
        $Package->products()->attach($request->products);

        
       return redirect()->route('dashboard.Packages.index');
    }

    public function get()
    {
        $data = Package::select('*');
        return  Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                    return $btn = '
                        <a href="' . Route('dashboard.Packages.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                        <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
           //     }
            })
            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('price', function ($row) {
                return $row->price;
            })
            ->rawColumns(['action', 'title','price'])
            ->make(true);
    }

    public function edit(Package $Package)
    {
        $products = Product::all();
       return view('dashboard.Packages.edit' , compact('Package','products'));
    }


    public function update(Request $request, Package $Package)
    {
         $Package->update($request->except('_token'));
         if ($request->has('image')) {
            $Package->update(['image'=>$this->upload($request->image)]);
         }
         $Package->products()->sync($request->products);

       return redirect()->route('dashboard.Packages.edit' , $Package);
    }
    
    public function delete (Request $request)
    {

        if(is_numeric($request->id)){
            Package::where('id' , $request->id)->delete();
       }
       return redirect()->route('dashboard.Packages.index');
    }



}
