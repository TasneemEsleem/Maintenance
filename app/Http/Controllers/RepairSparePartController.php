<?php

namespace App\Http\Controllers;

use App\Models\RepairSparePart;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RepairSparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->authorizeResource(RepairSparePart::class, 'repairSpairPart');
    }
    public function index()
    {
        $spare_parts = SparePart::all();
        return response()->view('cms.repair_spare_part.index', ['spare_parts' => $spare_parts]);
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

        $validator = Validator($request->all(), [
            'spare_part_id' => 'required|numeric|exists:spare_parts,id',
            'repair_id' => 'required|numeric|exists:repairs,id',
        ]);

        if (!$validator->fails()) {
            $repairSparePart=RepairSparePart::where('spare_parts_id',$request->get('spare_part_id'))->where('repairs_id',$request->get('repair_id'))->first();
            if ($repairSparePart==null) {
                $this->addSparePart($request->get('spare_part_id'),$request->get('repair_id'));
            } else {

                $this->deleteSparePart($repairSparePart);            }
            return response()->json(
                ['message' => 'Spare Part updated successfully'],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }


    }
    public function addSparePart($spare_part_id,$repairs_id)
    {
            $repairSparePart = new RepairSparePart();
            $repairSparePart->spare_parts_id= $spare_part_id;
            $repairSparePart->repairs_id = $repairs_id;
            $isSaved = $repairSparePart->save();
    }


    public function deleteSparePart(RepairSparePart $repairSparePart)
    {
        $isDeleted = $repairSparePart->delete();
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
        //
    }
}
