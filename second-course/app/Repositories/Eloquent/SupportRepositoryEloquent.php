<?php
namespace App\Repositories\Eloquent;

use stdClass;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class SupportRepositoryEloquent implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->where(function ($query) use ($filter) {
            if($filter) {
                $query->where('subject');
                $query->where('body', 'like', "%{$filter}%");
            }
        })
        ->all()
        ->toArray();
    }

    public function findOne(string $id): stdClass | null
    {
        $support = $this->model->find($id);

        if(!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
        
    }
    
    public function update(UpdateSupportDTO $update): stdClass | null
    {
        
    }
}
