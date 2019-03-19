<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'meeting_id'=>'integer',
            'user_id'=>'integer'
        ]);
        $meetingId = $request->input('meeting_id');
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);
        $meeting = Meeting::findOrFail($meetingId);
        if($meeting && $user){
            $meeting->audits += 1;
            if($meeting->update()){
                $user->meetings()->attach($meetingId);
                $response = [
                    'message'=>'user registered successfully',
                    'data'=>''];
                return response()->json($response,200);
            }
        }else{
            $response = [
                'message'=>'user can\'t register',
                'data'=>null];
            return response()->json($response,200);
        }
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
}
