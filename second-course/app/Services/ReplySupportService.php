<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
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
        return $this->repository->create($dto);
    }

    public function delete(string $id): bool|null
    {
        return $this->repository->delete($id);
    }
}
