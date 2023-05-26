<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTeachingRequest;
use App\Http\Requests\UpdateTeachingRequest;
use App\Models\Teaching;

class TeachingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teachings = auth()->user()->Teaching()->get();
        return view('frontend.Teaching.index', compact('teachings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.Teaching.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeachingRequest $request)
    {
        Teaching::create([
            'user_id' => auth()->user()->id,
            'course_name' => $request->course_name,
            
            'course_code' => $request->course_code,
        ]);
        return redirect()->back()->withMessage('Teaching created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(Teaching $Teaching)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(Teaching $Teaching)
    {
        return view('frontend.Teaching.edit', compact('Teaching'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeachingRequest $request, Teaching $Teaching)
    {
        $Teaching->update([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
           
        ]);
        return redirect()->back()->withMessage('Teaching updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teaching $Teaching)
    {
        $Teaching->delete();
        return redirect()->back()->withMessage('Teaching deleted successfully');
    }
}
