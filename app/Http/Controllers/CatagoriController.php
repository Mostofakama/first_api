<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagori;
class CatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
          'message' => 'this data read',
          'status'  => 200,
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
        $error =   $request->validate([
            'name' => 'required|string',
            'slag' => 'required|string',

          ]);
        $user = Catagori::create([
            'name' => $request->name,
            'slag' => $request->slag,
        ]);
       // return $user;
        if($user){
            return response()->json([
                //'form_requests' => $request->all(),
                'data' => $user,
                'status' => 200,
                'message' => 'data add success',
                'error' => $error,
            ]);
        }else{
            return response()->json([
                //'form_requests' => $request->all(),
                
                'status' => 222,
                'message' => 'data add Unsuccess',
            ]);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
