<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('Admin.course.all', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest | Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
        auth()->user()->courses()->create(array_merge($request->all(), ['images' => $imagesUrl]));

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //$course = Course::find($id);
        return view('Admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest |Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        //$course = Course::find($id);
        /* $url1=$article->images['images']['300'];
         //$url = Storage::disk($url1)->getAdapter()->getPathPrefix();

         return $url1;*/
        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));
            /*$files =$article->images;
            File::delete( ''.$files);*/

        } else {
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
        unset($inputs['imagesThumb']);
        $course->update($inputs);

        return redirect(route('courses.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //$article = Article::find($id);
        $course->delete();
        return back();
    }
}

