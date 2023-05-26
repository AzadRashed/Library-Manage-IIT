<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResearchSupervisionRequest;
use App\Http\Requests\UpdateResearchSupervisionRequest;
use App\Models\ResearchSupervision;

class ResearchSupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $research_supervisions = auth()->user()->researchSupervisions()->get();
        return view('frontend.researchSupervision.index', compact('research_supervisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.researchSupervision.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResearchSupervisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearchSupervisionRequest $request)
    {
        ResearchSupervision::create([
            'user_id' => auth()->user()->id,
            'level_of_study' => $request->level_of_study,
            'title' => $request->title,
            'supervisors' => $request->supervisors,
            'students' => $request->students,
            'area_of_research' => $request->area_of_research,
            'completion' => $request->completion,
        ]);
        return redirect()->back()->withMessage('Research supervision created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchSupervision $researchSupervision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchSupervision $researchSupervision)
    {
        return view('frontend.researchSupervision.edit', compact('researchSupervision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResearchSupervisionRequest  $request
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResearchSupervisionRequest $request, ResearchSupervision $researchSupervision)
    {
        $researchSupervision->update([
            'level_of_study' => $request->level_of_study,
            'title' => $request->title,
            'supervisors' => $request->supervisors,
            'students' => $request->students,
            'area_of_research' => $request->area_of_research,
            'completion' => $request->completion,
        ]);
        return redirect()->back()->withMessage('Research supervision updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResearchSupervision  $researchSupervision
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchSupervision $researchSupervision)
    {
        $researchSupervision->delete();
        return redirect()->back()->withMessage('Research supervision deleted successfully');
    }
}
