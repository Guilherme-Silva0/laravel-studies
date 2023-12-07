<?php

namespace App\Repositories\Eloquent;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplySupport;
use App\Repositories\ReplyRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ReplySupportRepository implements ReplyRepositoryInterface
{
    public function __construct(
        protected ReplySupport $model
    ) {
    }

    public function getAllBySupportId(string $supportId): array
    {
        $replies = $this->model->where('support_id', $supportId)->get();
        return $replies->toArray();
    }

    public function create(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->model->create([
            'content' => $dto->content,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id
        ]);
        
        return (object) $reply;

    }
}
