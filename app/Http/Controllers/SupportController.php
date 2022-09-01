<?php

namespace App\Http\Controllers;

use App\Enums\SupportEnum;

use App\Repositories\LessonRepositoryInterface;
use App\Repositories\SupportRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportRepositoryInterface $support_repository,
        protected LessonRepositoryInterface $lesson_repository,
        protected UserRepositoryInterface $user_repository,
    ){}

    public function index(Request $request)
    {
        //dd($request->all());
        
        $supports = $this
                    ->support_repository
                    ->getSupports(
                        status: $request->get('status', 'pendente'),
                    );
                
        $optionsStatus = SupportEnum::cases();

        return view('admin.supports.index', [
            'supports' => $supports,
            'optionsStatus' => $optionsStatus
        ]);
    }

    public function show($supports)
    {
        $support = $this->support_repository->findByIdSupport($supports);

        if (!$support) {
            return redirect()->back();
        }

        return view('admin.supports.details', compact('support'));
    }

}
