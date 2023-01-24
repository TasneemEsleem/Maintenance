<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemStatus;
use App\Models\Repair;
use App\Models\RepairProblem;
use App\Models\SparePart;
use App\Models\SparePartModel;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepairProblemController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(RepairProblem::class, 'repairProblem');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexRepairProblem()
    {
        // $repairs = Repair::join('problem_statuses', 'problem_status_id', '=', 'problem_statuses.id')
        // ->join('spair_parts', 'country_id', '=', 'spareparts.id')
        // ->select('cities.name','provinces.name','countries.name')
        // ->get();

        $repairs = Repair::where('agent_id', auth('user')->user()->id)->withCount('spareparts')->with('problem')->get();
       
        return response()->view('cms.repair_problem.indexRepairProblem', ['repairs' => $repairs]);
}


    public function index()
    {

        // $repairProblem = RepairProblem::withCount('SparePart')->get();

        $problem=Problem::all();

        if(auth()->user()->can('repair-Spare-Parts') && auth('user')->user()->user_type=='technical'){
            // $repair_problem=RepairProblem::with('problem')->get();
            $repairs = Repair::where('technecal_id', auth('user')->user()->id)->withCount('spareparts')->with('problem')->get();
            return response()->view('cms.repair_problem.index', compact('repairs','problem'));

        }elseif(auth()->user()->can('repair-Spare-Parts') && auth('user')->user()->user_type=='agent')
        {
            $repairs = Repair::withCount('spareparts')->with('problem')->get();
            return response()->view('cms.repair_problem.index', compact('repairs','problem'));

        }
        else{
            abort(403);

        }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', RepairProblem::class);

        // $repair_problem=RepairProblem::with('problem')->get();
        // // $problem=Problem::all();

        // $users=User::where('user_type','technical')->get();
        // $statuss=ProblemStatus::where('status',1)->get();

        // return response()->view('cms.repair_problem.create',compact('users','repair_problem','statuss'));


      }
// قطع الغيار مع الحالة والتفاصيل في المعلومات


      public function repairProblem($id){
        $this->authorize('create', RepairProblem::class);

        $problem=Problem::where('id',$id)->first();
        $repair=Repair::where('problem_id',$id)->first();
        $spareParts = SparePart::all();
        $repair_spareParts = $repair->spareparts;

        $repair_problem=RepairProblem::where('problem_id',$id)->first();


        $statuss=ProblemStatus::where('status',1)->get();
        if (count($repair_spareParts) > 0) {
            foreach ($spareParts as $smodel) {
                $smodel->setAttribute('assigned', false);
                foreach ($repair_spareParts as $sparepart_model) {
                    if ($smodel->id == $sparepart_model->id) {
                        $smodel->setAttribute('assigned', true);
                    }
                }
            }
        }

        return response()->view('cms.repair_problem.create',compact('repair_problem',
        'repair_problem','statuss','problem','repair','spareParts'));

      }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $validator = Validator($request->all(), [
            'details'=>'required',
            'app_status'=>'required',
        ]);
        if (!$validator->fails()) {
            $repairProblem = RepairProblem::where('problem_id',$request->input('problem_id'))->first();
if( $repairProblem==null){
    $repairProblem = new RepairProblem();
    $repairProblem->problem_id = $request->input('problem_id');
    $repairProblem->details = $request->input('details');
    $repairProblem->problem_status_id = $request->input('app_status');
    $repairProblem->repair_id  = $request->input('repair_id');
    $isSaved = $repairProblem->save();

    return response()->json(
        ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
        $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
    );
}else{

    $repairProblem->details = $request->input('details');
    $repairProblem->problem_status_id = $request->input('app_status');
    $isSaved = $repairProblem->save();

    return response()->json(
        ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
        $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
    );


}

        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
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
        $repair = Repair::where('id', $id)->first();


        // $spareParts=SparePartModel::where('s_model_id',$repair->problem->model->id)->with('sparePart')->get();


        $spareParts = SparePart::all();


       $repair_spareParts = $repair->spareparts;




        if (count($repair_spareParts) > 0) {
            foreach ($spareParts as $smodel) {
                $smodel->setAttribute('assigned', false);
                foreach ($repair_spareParts as $sparepart_model) {
                    if ($smodel->id == $sparepart_model->id) {
                        $smodel->setAttribute('assigned', true);
                    }
                }
            }
        }


        return response()->view('cms.repair_spare_part.index', compact('repair', 'spareParts'));

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
        //
    }
}
