<?php

namespace App\Repositories\Eloquent;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use stdClass;
use App\Models\Support;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\SupportRepositoryInterface;
use App\Repositories\PaginationPresenter;
use Illuminate\Support\Facades\Gate;

class SupportRepository implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->with('replies.user')
            ->where(function ($query) use ($filter) {
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
        $support = $this->model->findOrFail($id);

        if (Gate::denies('owner', $support->user_id)) {
            abort(403, 'Not Authorized');
        }

        $support->delete();
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

        if (Gate::denies('owner', $support->user_id)) {
            abort(403, 'Not Authorized');
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function updateStatus(string $id, SupportStatus $status): void
    {
        $this->model->where('id', $id)
            ->update([
                'status'=> $status->name
            ]);
    }
}
