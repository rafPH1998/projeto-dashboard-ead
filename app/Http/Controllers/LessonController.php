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

    public function index(Request $request, $moduleId)
    {
        $module = $this->module_repository
                    ->findById($moduleId);

        if (!$module) {
            return redirect()->back();
        }
        
        $lessons = $this->lesson_repository
                        ->getAllByModule(
            $moduleId,
            $request->filter ?? ''
        );  
    
        return view('admin.courses.modules.lessons.index', [
            'lessons' => convertItemsOfArrayToObject($lessons),
            'module' => $module
        ]);
    }

    public function create($moduleId)
    {
        $module = $this->module_repository
                        ->findById($moduleId);
        if (!$module) {
            return redirect()->back();
        }

        return view('admin.courses.modules..lessons.create', compact('module'));
    }

    public function store(StoreUpdateLesson $request, $moduleId)
    {
        $module = $this->module_repository
                        ->findById($moduleId);
        if (!$module) {
            return redirect()->back();
        }

        $module->lessons()
                ->create($request->validated());

        return redirect()
                ->route('lessons.index', $moduleId)
                ->with('success', 'Aula cadastrada com sucesso');
    }

}
