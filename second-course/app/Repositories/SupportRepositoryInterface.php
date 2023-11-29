<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass | null;
    public function delete(string $id): void;
    public function create(CreateSupportDTO $dto): stdClass;
    public function update(UpdateSupportDTO $update): stdClass | null;
}