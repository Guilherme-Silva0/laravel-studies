<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Events\SupportReplied;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use stdClass;

class ReplySupportService
{
    public function __construct(
        protected ReplyRepositoryInterface $repository
    ) {
    }

    public function getAllBySupportId(string $supportId): array
    {
        return $this->repository->getAllBySupportId($supportId);
    }

    public function create(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->repository->create($dto);
        
        SupportReplied::dispatch($reply);

        return $reply;
    }

    public function delete(string $id): bool|null
    {
        return $this->repository->delete($id);
    }
}
