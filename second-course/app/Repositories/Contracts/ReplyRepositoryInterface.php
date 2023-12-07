<?php
namespace App\Repositories;

use App\DTO\Replies\CreateReplyDTO;
use stdClass;

interface ReplyRepositoryInterface
{
    public function getAllBySupportId(string $supportId): array;

    public function create(CreateReplyDTO $dto): stdClass;
}
