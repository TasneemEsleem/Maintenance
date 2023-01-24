<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->authorizeResource(Language::class, 'language');
    }
    public function index()
    {
        $languages=Language::all();
        return response()->view('cms.languag.index', ['languages' => $languages]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.languag.create');
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
            'lang_name' => 'required|string|min:3',
            'lang_code' => 'required|string|min:2',
            'active'=> 'required | boolean',
 
 
        ]);
 
        if (!$validator->fails()) {
            $language = new Language();
            $language->lang_name = $request->input('lang_name');
            $language->lang_code = $request->input('lang_code');
            $language->active = $request->input('active');

            $isSaved = $language->save();
 
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return response()->view('cms.languag.edit', ['language' => $language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $validator = Validator($request->all(), [
            'lang_name' => 'required|string|min:3',
            'lang_code' => 'required|string|min:2',
            'active'=> 'required | boolean',
 
        ]);
        if (!$validator->fails()) {

            $language->lang_name = $request->input('lang_name');
            $language->lang_code = $request->input('lang_code');
            $language->active = $request->input('active');



     
            $isSaved = $language->save();
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
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $deleted = $language->delete();
     
        return response()->json(
            ['message' => $deleted ? __('cms.Deleted_successfully') : __('cms.Delete_failed!')],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
        }
}
