<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateModule;
use App\Repositories\Eloquent\ModuleRepository;
use App\Repositories\Eloquent\CourseRepository;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct(
        protected ModuleRepository $module_repository,
        protected CourseRepository $course_repository
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $courseId)
    {
        $course = $this->course_repository->findById($courseId);

        if (!$course) {
            return redirect()->back();
        }
        
        $modules = $this->module_repository->getAllByCourse(
            $courseId,
            $request->filter ?? ''
        );  
    
        return view('admin.courses.modules.index', [
            'modules' => convertItemsOfArrayToObject($modules),
            'course' => $course
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseId)
    {
        $course = $this->course_repository->findById($courseId);
        if (!$course) {
            return redirect()->back();
        }

        return view('admin.courses.modules.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModule $request, $courseId)
    {
        $course = $this->course_repository->findById($courseId);
        if (!$course) {
            return redirect()->back();
        }

        $course->modules()->create($request->validated());

        return redirect()->route('modules.index', [
            'id' => $courseId
        ])->with('success', 'Módulo cadastrado com sucesso');
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
    public function edit($courseId, $moduleId)
    {
        //dd('curso: '.$courseId, 'modulo: '. $moduleId . );
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
