<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(City::class, 'city');
    }
    public function index()
    {
        $country = Country::orderBy('name_ar', 'ASC')->get();
        $cities = City::all();
        return response()->view('cms.city.index', ['cities' => $cities, 'country' => $country]);
    }

    public function create()
    {
        $countries = Country::orderBy('name_ar', 'ASC')->get();
        return response()->view('cms.city.create', ['countries' => $countries]);
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
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
        ]);
        if (!$validator->fails()) {
            $city = new City();
            $city->name_ar = $request->input('name_ar');
            $city->name_en = $request->input('name_en');
            $city->country_id = $request->input('country_id');
            $isSaved = $city->save();

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
    public function edit(City $city)
    {
        $countries = Country::orderBy('name', 'ASC')->get();
        return response()->view('cms.city.edit', ['city' => $city, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'country_id' => 'required|exists:countries,id',
        ]);
        if (!$validator->fails()) {
            $city->name_ar = $request->input('name_ar');
            $city->name_en = $request->input('name_en');
            $city->country_id = $request->input('country_id');
            $isSaved = $city->save();
            return response()->json(
                ['message' => $isSaved ? 'Updated Successfully' : 'Update failed!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function destroy(City $city)
    {
        $deleted = $city->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
