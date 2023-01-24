<?php

namespace App\Http\Controllers;

use App\Models\ProblemStatus;
use App\Models\ProblemStatusModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProblemStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProblemStatus::class, 'p   roblemStatus');
    }
    public function index()
    {
        $this->authorize('viewAny', ProblemStatus::class);

        $problem_statuss = ProblemStatus::all();
        return response()->view('cms.problem_status.index', ['problem_statuss' => $problem_statuss]);
    }
    public function create()
    {
        $this->authorize('create', ProblemStatus::class);

        return response()->view('cms.problem_status.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', ProblemStatus::class);

        $validator = Validator($request->all(), [
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $problem_status = new ProblemStatus();
            $problem_status->name_en = $request->input('name_en');
            $problem_status->name_ar = $request->input('name_ar');
            $isSaved = $problem_status->save();
            return response()->json(
             ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
              $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,);
        }
    }
    public function edit($id)
    {

        $problem_status = ProblemStatus::findOrFail($id);

        $this->authorize('update',$problem_status );

        return response()->view('cms.problem_status.edit', ['problem_status' => $problem_status]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'name_en' => 'nullable|string|min:3',
            'name_ar' => 'nullable|string|min:3',
        ]);
        if (!$validator->fails()) {
            $problem_status = ProblemStatus::findOrFail($id);
            $this->authorize('update',$problem_status );


            $problem_status->name_en = $request->input('name_en');
            $problem_status->name_ar = $request->input('name_ar');
            $isSaved = $problem_status->save();
            return response()->json(
                ['message' => $isSaved ? 'Updated Successfully' : 'Update failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(ProblemStatus $problem_status)
    {
        $this->authorize('delete',$problem_status );
        $deleted = $problem_status->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
    public function ProblemStatusActive($id)
    {
        $problem_status = ProblemStatus::Where('id', '=', $id)->first();

        $problem_status->status = !$problem_status->status;
        $problem_status->save();
        return response()->json(
            ['message' => $problem_status ? 'Change Status successfully' : 'Change Status failed!'],
            $problem_status ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}

