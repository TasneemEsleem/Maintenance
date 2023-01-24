<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemModel;
use App\Models\SModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->authorizeResource(Problem::class, 'problem');
    }
    public function index()
    {

        $id=auth('user')->user()->id;
        $problems = Problem::Where('user_id',$id)->withCount('models')->get();
        // $problems=Problem::withCount('models')->where(auth('user')->user()->id,'user_id')->get();
        $this->authorize('viewAny', Problem::class);


        return response()->view('cms.problem.index', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models=SModel::where('active',1)->get();
        $this->authorize('create', Problem::class);

        return response()->view('cms.problem.create',['models'=>$models]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->authorize('create', Problem::class);
        $validator = Validator($request->all(), [

            'description'=>'required|string',
            'models'=>'required',
        ]);
        if (!$validator->fails()) {



            $problem = new Problem();
            $problem->details=$request->input('description');
            $problem->user_id = auth('user')->user()->id;
            $problem->country_id = auth('user')->user()->country_id;
            $problem->city_id = auth('user')->user()->city_id;


            $isSaved=$problem->save();
            if( $isSaved){
                foreach ($request->input('models') as $model_id) {
                    $problemModel = new ProblemModel();
                    $problemModel->problem_id =$problem->id;
                    $problemModel->model_id =$model_id;
                    $problemModel->user_id = auth('user')->user()->id;
                    $isSaved = $problemModel->save();
                }
            }



        return response()->json(
            ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
        );
    }
    else {
        return response()->json(
            ['message' => $validator->getMessageBag()->first()],
            Response::HTTP_BAD_REQUEST,
        );



 }
}






        // $isSaved = $request->user()->save($user);



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
        $problem = Problem::findOrFail($id);
        $this->authorize('update', $problem);

        $sparePartModels=SModel::where('active',1)->get();
        return response()->view('cms.problem.edit',compact('sparePartModels','problem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
     //
    $validator = Validator($request->all(), [
    //    'd_log' => 'required|number',
    //    'd_lat' => 'required|number',
    //    'product_models_id'=>'required',
    ]);
    if (!$validator->fails()) {
        $problem = Problem::findOrFail($id);
        $this->authorize('update', $problem);

        $problem->d_log = $request->input('d_log');
        $problem->d_lat = $request->input('d_lat');
        $problem->model_id = $request->input('model_id');
        $problem->details = $request->input('details');


        $problem->user_id =auth('user')->user()->id;




        $isSaved = $problem ->save();
        // $isSaved = $request->user()->problem()->save($problem);

        return response()->json(
            ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
        );
    } else {
        return response()->json(
            ['message' => $validator->getMessageBag()->first()],
            Response::HTTP_BAD_REQUEST,
        );
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $problem=Problem::where('id',$id)->first();
        $this->authorize('delete', $problem);

        $isDeleted = $problem->delete();
        return response()->json(['message' => 'Deleted successfully'], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
