<?php

namespace App\Http\Controllers\api;

use Validator;
use App\Models\Catagori;
//  use Illuminate\Validation\Validator;
//use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\api\CategoriRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoriContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Catagori::latest()->get();
        return response()->json([
          'success' => true,
          'message' => 'successfull categori redrive!',
          'data'    => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = validator::make($request->all(),[
            'name' => 'required|string|unique:catagoris',
        ]);

        if($data->fails()){
            return response()->json(
                [
                    'success' =>false,
                    'message' => 'error',
                    'errors' => $data->getMessageBag(),
                ]
                ,422);
                
        }else{
            $formData = $data->validated();
            $formData['slag'] = Str::slug($formData['name']);
            $categori = Catagori::create($formData);
            return response()->json([
                'success' => true,
                'message' => 'Successfully categori Created',
                'data' => $categori,

            ]);
        }

        // return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Catagori::find($id);
        if($data){
            return response()->json([
                'success' => true,
                'message' => 'Successfull',
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'categori not found',
                'error' => [],
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Catagori::find($id);
        
        if(!$data){
            return response()->json([
                'success' => false,
                'message' => 'Categori id not found!',
                'errors'  => [],
            ],404);
        }
        $validate = validator::make($request->all(),[
            'name' => 'required|string|unique:catagoris,name,' . $data->id,
        ]);
        if($validate->fails()){
            return response()->json([
                'success' => false,
                'message' => 'error',
                'error' => $validate->getMessageBag(),
 
            ],404);
        }

        $formData = $validate->validated();
     //  $salg =  $formData['slag'] =  Str::slug($formData('name'));
    $abc = $formData['slag'] = Str::slug($formData['name']);

     //$dd =   $data->update($formData);
       $update = Catagori::where('id',$id)->update([
        'name' => $request->name,
        'slag' => $abc,

       ]);
        return response()->json([
            'success' =>true,
            'message' => 'Successfully Categori Update',
            'data' => [],

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // return response()->json([
        //     'message' => $id,

        // ]);


        $data = Catagori::find($id);
        if(!$data){
            return response()->json([
                'success' => false,
                'message' => 'Categori Not found',
                'data' => []
            ]);

          //  $data->delete();
          

        }
        Catagori::where('id',$id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'categori deleted successfull',
                'data' => []
            ]);
    }
}
