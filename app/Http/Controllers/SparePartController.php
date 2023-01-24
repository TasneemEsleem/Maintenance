<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Language;
use App\Models\SModel;
use App\Models\SparePart;
use App\Models\SparePartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->authorizeResource(SparePart::class, 'sparpart');
    }
    public function index()
    {

        $this->authorize('viewAny', SparePart::class);

        $spareparts = SparePart::withCount('smodels')->withCount('spareparttranslation')->get();

        return response()->view('cms.spare_part.index', ['spareparts' => $spareparts]);     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', SparePart::class);

        $languages=Language::all();
        $models = SModel::where('active', '=', true)->get();
       return response()->view('cms.spare_part.create', ['models' => $models,'languages'=>$languages]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', SparePart::class);

        $validator = Validator($request->all(), [
            'oem_part_number' => 'required|string|min:3',
            'katun_part_number' => 'required|string|min:3',
            'local_number' => 'required|string|min:3',
            'over_view'=>'required|string|min:3',
            'price'=>'required|string|min:3',
            'value'=>'required|string|min:3',
            'unit'=>'required|string|min:3',


            'language_id'=>'required|numeric|exists:languages,id',

            'image_1' => 'required|image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',

        ]);



        if (!$validator->fails()) {

            $spare_part = new SparePart();
            $spare_part->oem_part_number = $request->input('oem_part_number');
            $spare_part->katun_part_number = $request->input('katun_part_number');
            $spare_part->local_number = $request->input('local_number');
            $spare_part->price = $request->input('price');
            $spare_part->value = $request->input('value');
            $spare_part->unit = $request->input('unit');
            $isSaved = $spare_part->save();
            if ($isSaved) {

                $this->saveImage($request, $spare_part, 'image_1');
                $this->saveImage($request, $spare_part, 'image_2');
                $this->saveImage($request, $spare_part, 'image_3');
                $this->saveImage($request, $spare_part, 'image_4');
                $this->saveImage($request, $spare_part, 'image_5');
            }

             $spare_part->spareparttranslation()->create(
                [
                    'name'=>$request->input('name'),
                    'over_view'=>$request->input('over_view'),
                    'language_id'=>$request->input('language_id'),
                    'spare_part_id'=>$request->input('spare_part_id'),

                ],);
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );

        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }




    public function SparepartDetails(Request $request,  $id)
    {
        $sparepart=SparePart::Where('id',$id)->first();

        return response()->view('cms.spare_part.sparepart-details', ['sparepart' => $sparepart]);
    }
    public function editSparepartModels(Request $request,  $id)
    {
        $sparepart=SparePart::Where('id',$id)->first();
        $smodels = SModel::where('active',1)->get();
        $sparepart_models = $sparepart->smodels;
        if (count($sparepart_models) > 0) {
            foreach ($smodels as $smodel) {
                $smodel->setAttribute('assigned', false);
                foreach ($sparepart_models as $sparepart_model) {
                    if ($smodel->id == $sparepart_model->id) {
                        $smodel->setAttribute('assigned', true);
                    }
                }
            }
        }
        return response()->view('cms.spare_part.sparepart-models', ['sparepart' => $sparepart, 'smodels' => $smodels]);
    }




    public function updateSparepartModels(Request $request)
    {
        $validator = Validator($request->all(), [
            's_model_id' => 'required|numeric|exists:s_models,id',
            'sparePart_id' => 'required|numeric|exists:spare_parts,id',
        ]);

        if (!$validator->fails()) {
            $sparePartModels=SparePartModel::where('s_model_id',$request->get('s_model_id'))->where('spare_part_id',$request->get('sparePart_id'))->first();
            if ($sparePartModels==null) {
                $this->addModels($request->get('sparePart_id'),$request->get('s_model_id'));
            } else {

                $this->deleteModels($sparePartModels);            }
            return response()->json(
                ['message' => 'Models updated successfully'],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }



    public function addModels($spare_part_id,$s_model_id)
    {
            $spaerpart_model = new SparePartModel();
            $spaerpart_model->spare_part_id = $spare_part_id;
            $spaerpart_model->s_model_id = $s_model_id;
            $isSaved = $spaerpart_model->save();
    }


    public function deleteModels(SparePartModel $models)
    {
        $isDeleted = $models->delete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function show(SparePart $sparePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sparePart=SparePart::where('id',$id)->first();
        $this->authorize('update', $sparePart);


        $languages = Language::where('active', '=', true)->get();
        return response()->view('cms.spare_part.edit', ['sparePart' => $sparePart, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'oem_part_number' => 'required|string|min:3',
            'katun_part_number' => 'required|string|min:3',
            'local_number' => 'required|string|min:3',
            'over_view'=>'required|string|min:3',
            'price'=>'required|string|min:3',
            'value'=>'required|string|min:3',
            'unit'=>'required|string|min:3',
            'language_id'=>'required|numeric|exists:languages,id',
            'image_1' =>'nullable', 'image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',


        ]);



        if (!$validator->fails()) {
            $sparePart=SparePart::where('id',$id)->first();
            $this->authorize('update', $sparePart);


            $sparePart->oem_part_number = $request->input('oem_part_number');
            $sparePart->katun_part_number = $request->input('katun_part_number');
            $sparePart->local_number = $request->input('local_number');
            $sparePart->price = $request->input('price');
            $sparePart->value = $request->input('value');
            $sparePart->unit = $request->input('unit');
            $isSaved = $sparePart->save();
            if ($isSaved) {

                $this->saveImage($request, $sparePart, 'image_1');
                $this->saveImage($request, $sparePart, 'image_2');
                $this->saveImage($request, $sparePart, 'image_3');
                $this->saveImage($request, $sparePart, 'image_4');
                $this->saveImage($request, $sparePart, 'image_5');
            }

             $sparePart->spareparttranslation()->update(
                [
                    'name'=>$request->input('name'),
                    'over_view'=>$request->input('over_view'),
                    'language_id'=>$request->input('language_id'),

                ],);
            return response()->json(
                ['message' => $isSaved ? 'Updated successfully' : 'Updated failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );

        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sparePart=SparePart::where('id',$id)->first();
        $this->authorize('delete', $sparePart);


        $deleted = $sparePart->delete();
        if ($deleted) {
            $this->deleteImages($sparePart);
        }

        return response()->json(
            ['message' => $deleted ? __('cms.Deleted_successfully') : __('cms.Delete_failed!')],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
       }


       private function deleteImages(SparePart $sparePart)
       {
           foreach ($sparePart->images as $image) {
               Storage::disk('public')->delete('spareParts/' . $image->name);
               $image->delete();
           }
       }

       private function saveImage(Request $request, SparePart $sparePart, String $key, bool $update = false)
       {
           if ($request->hasFile($key)) {
               if ($update) {
                   foreach ($sparePart->images as $image) {
                       if (str_contains($image->name, $key)) {
                           Storage::disk('public')->delete('spareParts/' . $image->name);
                           $image->delete();
                       }
                   }
               }
               $imageName = time() . '_' . str_replace(' ', '', $sparePart->name) . "_model_$key." . $request->file($key)->extension();
               $request->file($key)->storePubliclyAs('spareParts', $imageName, ['disk' => 'public']);

               $image = new Image();
               $image->name = $imageName;
               $image->url = 'spareParts/' . $imageName;
               $sparePart->images()->save($image);
           }
       }
}
