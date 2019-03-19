<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;
use Validator;
class meetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = Meeting::all();
        $response =[
            'message'=>'data retrived successfully',
            'data' => $meeting
        ];
        return response()->json($response,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string',
            'description' => 'string',
            'auditsLimit' => 'int',
            'time'=>'date'
        ]);
        $meeting = new Meeting();
        $meeting->title = $request->input('title');
        $meeting->description = $request->input('description');
        $meeting->auditsLimit = $request->input('auditsLimit');
        $meeting->time = $request->input('time');
        if ($meeting->save()) {
            $response = ['message' => 'meeting saved successfully',
                'data' => $meeting];
            return response()->json($response, 200);
        } else {

            $response = ['message' => 'meeting saved successfully',
                'data' => $meeting];
            return response()->json($response, 200);

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
        return response()->json(['message'=>"data delete successfully"],200);
    }
}
