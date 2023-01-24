<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\SModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class SModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(SModel::class, 'sModel');
    }
    public function index()
    {
        $this->authorize('viewAny', SModel::class);

        $models = SModel::all();
        return response()->view('cms.smodel.index', ['models' => $models]);
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', SModel::class);

        $brands = Brand::where('active', '=', true)->get();
        $categories = Category::where('active', '=', true)->get();

        return response()->view('cms.smodel.create', ['categories' => $categories, 'brands' => $brands]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', SModel::class);

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'brand_id' => 'required|numeric|exists:brands,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'active' => 'required | boolean',
            'image_1' => 'required|image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',


        ]);

        if (!$validator->fails()) {
            $sModel = new SModel();
            $sModel->name = $request->input('name');
            $sModel->brand_id = $request->input('brand_id');
            $sModel->category_id = $request->input('category_id');
            $sModel->active = $request->input('active');

            $isSaved = $request->user()->models()->save($sModel);
            if ($isSaved) {

                $this->saveImage($request, $sModel, 'image_1');
                $this->saveImage($request, $sModel, 'image_2');
                $this->saveImage($request, $sModel, 'image_3');
                $this->saveImage($request, $sModel, 'image_4');
                $this->saveImage($request, $sModel, 'image_5');
            }
            return response()->json(
                ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Http\Response
     */
    public function show(SModel $sModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $sModel=SModel::where('id',$id)->first();
        $this->authorize('update', $sModel);


        $categories = Category::where('active', '=', true)->get();
        $brands = Brand::where('active', '=', true)->get();
        return response()->view('cms.smodel.edit', [ 'categories' => $categories, 'brands' => $brands,'sModel'=>$sModel]);
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'brand_id' => 'required|numeric|exists:brands,id',
            'category_id' => 'required|numeric|exists:categories,id',
            'active' => 'required | boolean',
            'image_1' =>'nullable', 'image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $sModel = SModel::findOrFail($id);

            // $sModel=SModel::where('id',$id)->first();
            $this->authorize('update', $sModel);


            $sModel->name = $request->input('name');
            $sModel->brand_id = $request->input('brand_id');
            $sModel->category_id = $request->input('category_id');
            $sModel->active = $request->input('active');
            $isSaved = $request->user()->models()->save($sModel);
            if ($isSaved) {
                $this->saveImage($request, $sModel, 'image_1');
                $this->saveImage($request, $sModel, 'image_2');
                $this->saveImage($request, $sModel, 'image_3');
                $this->saveImage($request, $sModel, 'image_4');
                $this->saveImage($request, $sModel, 'image_5');
            }
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SModel  $sModel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $sModel=SModel::where('id',$id)->first();

        $this->authorize('delete', $sModel);
        $deleted = $sModel->delete();
        if ($deleted) {
            $this->deleteImages($sModel);
        }
        return response()->json(
            [
                'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $deleted ? 'Model deleted successfully' : 'Model deleting failed!',
                'icon' => $deleted ? 'success' : 'error'
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    private function deleteImages(SModel $sModel)
    {
        foreach ($sModel->images as $image) {
            Storage::disk('public')->delete('smodels/' . $image->name);
            $image->delete();
        }
    }

    private function saveImage(Request $request, SModel $sModel, String $key, bool $update = false)
    {
        if ($request->hasFile($key)) {
            if ($update) {
                foreach ($sModel->images as $image) {
                    if (str_contains($image->name, $key)) {
                        Storage::disk('public')->delete('smodels/' . $image->name);
                        $image->delete();
                    }
                }
            }
            $imageName = time() . '_' . str_replace(' ', '', $sModel->name) . "_model_$key." . $request->file($key)->extension();
            $request->file($key)->storePubliclyAs('smodels', $imageName, ['disk' => 'public']);

            $image = new Image();
            $image->name = $imageName;
            $image->url = 'smodels/' . $imageName;
            $sModel->images()->save($image);
        }
    }
}
