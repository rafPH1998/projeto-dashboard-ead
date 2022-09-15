<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplySupport;
use Illuminate\Http\Request;
use App\Events\SupportReplied;
use App\Repositories\ReplyRepositoryInterface;
use App\Repositories\SupportRepositoryInterface;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportRepositoryInterface $support_repository,
        protected ReplyRepositoryInterface $reply_repository
    ){}

    public function store(StoreReplySupport $request, $supportId)
    {
        $user = auth()->user();

        $support = $this->support_repository
                        ->findByIdSupport($supportId);

        if (!$support) {
            return redirect()->back();
        }

        $data = $request->only('description', 'support_id');

        $data['admin_id'] = $user->id;
        $data['user_id'] = $data['admin_id'];

        $replySupport = $support->replies()->create($data);
        event(new SupportReplied($replySupport));

        return redirect()->route('supports.show', $supportId);
    }

}
