<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplySupport;
use App\Models\Support;
use App\Repositories\Eloquent\ReplyRepository;
use App\Repositories\Eloquent\SupportRepository;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportRepository $support_repository,
        protected ReplyRepository $reply_repository
    ){}

    public function store(StoreReplySupport $request, $supportId)
    {
        $support = $this->support_repository->findByIdSupport($supportId);

        if (!$support) {
            return redirect()->back();
        }

        $data = $request->only('description', 'support_id');

        $data['user_id'] = 2;
        $data['admin_id'] = 2;

        $support->replies()->create($data);

        return redirect()->route('supports.show', $supportId);
    }

}
