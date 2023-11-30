<?php

namespace App\Repositories\Eloquent;

use stdClass;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\PaginationInterface;
use App\Repositories\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;

class SupportRepositoryEloquent implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model->where(function ($query) use ($filter) {
            if($filter) {
                $query->where('subject');
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })
        ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->where(function ($query) use ($filter) {
            if($filter) {
                $query->where('subject');
                $query->orWhere('body', 'like', "%{$filter}%");
            }
        })
        ->get()
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
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass | null
    {
        if(!$support = $this->model->find($dto->id)) {
            return null;
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }
}
