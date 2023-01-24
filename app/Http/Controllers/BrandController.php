<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brand');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return response()->view('cms.brand.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.brand.create');
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
            'name' => 'required|string|min:3',
            //    'code' => 'required|string|min:2',
            'active' => 'required | boolean',
            'image' => 'required|image|mimes:png,jpg,jpeg',


        ]);

        if (!$validator->fails()) {
            $brand = new Brand();
            //    $brand->code = $request->input('code');
            $brand->name = $request->input('name');
            $brand->active = $request->input('active');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imagetitle =  time() . '_brand_image.' . $file->getClientOriginalExtension();
                $status = $request->file('image')->storePubliclyAs('images/brands', $imagetitle);
                $imagePath = 'images/brands/' . $imagetitle;
                $brand->image = $imagePath;
            }
            $isSaved = $request->user()->brands()->save($brand);

            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
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
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return response()->view('cms.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            // 'code' => 'required|string|min:3',
            'active' => 'required | boolean',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {

            $brand->name = $request->input('name');
            // $brand->code = $request->input('code');
            $brand->active = $request->input('active');



            if ($request->hasFile('image')) {
                //Delete category previous image.
                Storage::delete($brand->image);
                //Save new image.
                $file = $request->file('image');
                $imageName = time() . '_brand_image.' . $file->getClientOriginalExtension();
                $request->file('image')->storePubliclyAs('images/brands', $imageName);
                $imagePath = 'images/brands/' . $imageName;
                $brand->image = $imagePath;
            }
            $isSaved = $brand->save();
            return response()->json(
                ['message' => $isSaved ? 'Updated Successfully' : 'Update failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $deleted = $brand->delete();
        if ($deleted) {
            Storage::delete($brand->image);
        }
        return response()->json(
            [
                'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $deleted ? 'brand deleted successfully' : 'brand deleting failed!',
                'icon' => $deleted ? 'success' : 'error'
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
