<?php
namespace App\Repositories\Eloquent;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;

class SupportRepositoryEloquent implements SupportRepositoryInterface
{
    public function getAll(string $filter = null): array
    {
        
    }
    public function findOne(string $id): stdClass | null
    {
        
    }
    public function delete(string $id): void
    {
        
    }
    public function create(CreateSupportDTO $dto): stdClass
    {
        
    }
    public function update(UpdateSupportDTO $update): stdClass | null
    {
        
    }
}
