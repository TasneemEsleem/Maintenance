<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('user-api')->check()) {
            $problem = Problem::where('country_id', auth('user-api')->user()->country_id)->get();
            $users = User::where('user_type', 'technical')->where('country_id', auth('user-api')->user()->country_id)->get();
            // dd($users)
            $repair = Repair::with('problem')->get();
            return response()->json([
                'data' => $problem,
                $repair,
                $users,
                'status' => true,
                'message' => 'success'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'problem_id' => 'required',
            'technecal_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $repair = Repair::where('problem_id', $request->get('problem_id'))->first();
            if ($repair == null) {
                $repair = new Repair();
                $repair->problem_id = $request->input('problem_id');
                $repair->technecal_id = $request->input('technecal_id');
                $repair->agent_id = auth('user-api')->user()->id;
                $isSaved = $repair->save();
                return response()->json(
                    ['message' => 'success']
                );
            } else {
                return response()->json(
                    ['message' => 'This Problem It Given Technical User']
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
            );
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
        //
    }
}
