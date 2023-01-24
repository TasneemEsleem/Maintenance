<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Country::class, 'country');
    }
    public function index()
    {
        $countries = Country::all();
        return response()->view('cms.country.index', ['countries' => $countries]);
    }

    public function create()
    {
        return response()->view('cms.country.create');
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
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
        ]);
        if (!$validator->fails()) {
            $country = new Country();
            $country->name_en = $request->input('name_en');
            $country->name_ar = $request->input('name_ar');
            $isSaved = $country->save();
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
    public function edit(Country $country)
    {
        return response()->view('cms.country.edit', ['country' => $country]);
    }
    public function getCity($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json(['cities' => $cities]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $validator = Validator($request->all(), [
            'name_en' => 'nullable|string|min:3',
            'name_ar' => 'nullable|string|min:3',
        ]);
        if (!$validator->fails()) {
            $country->name_en = $request->input('name_en');
            $country->name_ar = $request->input('name_ar');
            $isSaved = $country->save();
            return response()->json(
                ['message' => $isSaved ? 'Updated Successfully' : 'Update failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Country $country)
    {
        $deleted = $country->delete();

        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
