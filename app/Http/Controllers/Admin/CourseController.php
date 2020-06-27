<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        return view('Admin.courses.all', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest | Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CourseRequest $request)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
        auth()->user()->courses()->create(array_merge($request->all(), ['images' => $imagesUrl]));

        Alert::success('دوره با موفقیت ایجاد شد')->autoClose($milliseconds = 5000)->showConfirmButton($btnText = 'بسیار خوب', $btnColor = '#3085d6');


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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course)
    {
        //$course = Course::find($id);
        return view('Admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest |Request $request
     * @param \App\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CourseRequest $request, Course $course)
    {

        $file = $request->file('images');
        $inputs = $request->all();

        if ($file) {
            $inputs['images'] = $this->uploadImages($request->file('images'));

        } else {
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
        unset($inputs['imagesThumb']);
        $course->update($inputs);
        Alert::success('دوره با موفقیت بروزرسانی شد')->autoClose(3000)->showConfirmButton($btnText = 'بسیار خوب', $btnColor = '#3085d6');

        return redirect(route('courses.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        // اینجا بصورت دیفالت  توی متد های اپدیت- ادیت-دیلیت میاد لاراول از ایدی استغاده میکنه توی اپیزودها من تغییرش دادم به  روشی که الان توی کورس ها هم میبینی این بهش میگن روت مدل
        //بایندینگ که مستقیما از مدل استفاده میشه میتونی دستی انجامش بدی میتونی با کامند لاراول بهش دسترسی داشته باشی بذار برات مثال رو بزنم ببینی
        //$article = Article::find($id);
        $course->delete();
        Alert::success('دوره با موفقیت حذف شد')->showConfirmButton($btnText = 'بسیار خوب', $btnColor = '#3085d6')->autoClose(4000);

        return back();
    }
}

