<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\StoreUpdateCourse;
use App\Models\Course;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\UploadFile;

class CourseController extends Controller
{
    public function __construct(
        protected CourseRepositoryInterface $courseRepository, 
        protected UploadFile $uploadFile
    ){}

    public function index(Request $request)
    {
        $courses = $this->courseRepository
                        ->getAll($request->filter ?? '');     

        return view('admin.courses.index', [
            'courses' => convertItemsOfArrayToObject($courses)
        ]); 
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Course $course, StoreUpdateCourse $request)
    {
        $course->fill([
            'available'   => $request->get('available'),
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
            'image'       => $request->image
        ]);

        if ($course['image']) {
            $course['image'] = $this->uploadFile->store($request->image, 'courses');
        }

        $course->save();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Curso cadastrado com sucesso');
    }


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

    public function update(StoreUpdateCourse $request, $id)
    {
        $data = $request->only(['name', 'description']);

        if ($request->image) {
            $course = $this->courseRepository
                            ->findById($id);
            
            if ($course && $course->image) {
                $this->uploadFile
                    ->removeFile($course->image);
            }

            $data['image'] = $this->uploadFile
                                    ->store($request->image, 'courses');
        }

        $this->courseRepository->update($id, $data);

        return redirect()
                ->route('courses.index')
                ->with('success', 'Curso atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()
                    ->route('courses.index')
                    ->with('success', 'Curso excluido com sucesso');
    }
}
