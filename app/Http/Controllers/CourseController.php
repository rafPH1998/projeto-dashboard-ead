<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreCourse;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\UploadFile;

class CourseController extends Controller
{
    public function __construct(protected CourseRepository $courseRepository, protected UploadFile $uploadFile)
    {
    }

    public function index(Request $request)
    {
        $courses = $this->courseRepository->getAll(
            $request->get('filter', '')
        );        

        return view('admin.courses.index', [
            'courses' => convertItemsOfArrayToObject($courses)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourse $request)
    {
        $data = $request->all();

        if ($request->image) {
            $data['image'] = $this->uploadFile->store($request->image, 'courses');
        }

        $this->courseRepository->create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Curso cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->courseRepository->findById($id);

        if (!$course) {
            return redirect()->back();
        }

        return view('admin.courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
