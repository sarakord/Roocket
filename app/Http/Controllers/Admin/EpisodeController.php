<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use App\Http\Requests\EpisodeRequest;
use Illuminate\Http\Request;

class EpisodeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $episodes = Episode::latest()->paginate(5);
        return view('Admin.episodes.all', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //$episodes=Course::latest()->get();
        $courses = Course::orderBy('id', 'DESC')->get();
        //dd($episodes);
        return view('Admin.episodes.create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EpisodeRequest | Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EpisodeRequest $request)
    {
        $episode = Episode::create($request->all());
        $this->setCourseTime($episode);

        return redirect(route('episodes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /* public function show($id)
     {
         //
     }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $episode = Episode::find($id);
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('Admin.episodes.edit', ['episode' => $episode, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EpisodeRequest | Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(EpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->all());
        $this->setCourseTime($episode);

        return redirect(route('episodes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        return back();
    }
}
