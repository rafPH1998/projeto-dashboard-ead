<?php

namespace App\Http\Controllers;

use App\Enums\SupportEnum;
use App\Repositories\Eloquent\LessonRepository;
use App\Repositories\Eloquent\SupportRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportRepository $support_repository,
        protected LessonRepository $lesson_repository,
        protected UserRepository $user_repository,
    ){}

    public function index(Request $request)
    {
        
        $supports = $this
                    ->support_repository
                    ->getSupports(
                        status: $request->get('status', 'pendente'),
                        page: (int) $request->get('page', 1)
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
