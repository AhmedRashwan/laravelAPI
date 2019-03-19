<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['name'=>'string',
            'email'=>'unique:users',
            'password'=>'max:10'
            ]);

        $user = new User();
        $user->name =$request->input('name');
        $user->email =$request->input('email');
        $user->password =$request->input('password');
        $user->title =$request->input('title');
        if($user->save()){
            $response = [
                'message'=>'user added successfully',
                'data'=>$user
            ];
            return response()->json($response,200);
        }else{
            $response = [
                'message'=>'error while adding user',
                'data'=>$user
            ];
            return response()->json($response,404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()){
            $response = [
                'message'=>'user deleted successfully',
                'data'=>$user
            ];
            return response()->json($response,200);
        }else{
            $response = [
                'message'=>'error while deleting user',
                'data'=>$user
            ];
            return response()->json($response,404);
        }
    }
}
