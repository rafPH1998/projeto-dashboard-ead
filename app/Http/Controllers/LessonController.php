<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLesson;
use Illuminate\Http\Request;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\ModuleRepositoryInterface;

class LessonController extends Controller
{
    public function __construct(
        protected ModuleRepositoryInterface $module_repository,
        protected LessonRepositoryInterface $lesson_repository
    ){}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $moduleId)
    {
        $module = $this->module_repository->findById($moduleId);

        if (!$module) {
            return redirect()->back();
        }
        
        $lessons = $this->lesson_repository->getAllByModule(
            $moduleId,
            $request->filter ?? ''
        );  
    
        return view('admin.courses.modules.lessons.index', [
            'lessons' => convertItemsOfArrayToObject($lessons),
            'module' => $module
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($moduleId)
    {
        $module = $this->module_repository->findById($moduleId);
        if (!$module) {
            return redirect()->back();
        }

        return view('admin.courses.modules..lessons.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLesson $request, $moduleId)
    {
        $module = $this->module_repository->findById($moduleId);
        if (!$module) {
            return redirect()->back();
        }

        $module->lessons()->create($request->validated());

        return redirect()->route('lessons.index', $moduleId)->with('success', 'Aula cadastrada com sucesso');
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
        //
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
