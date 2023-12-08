<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportService $supportService,
        protected ReplySupportService $replySupportService
    ) {
    }

    public function index(string $id)
    {
        if (!$support = $this->supportService->findOne($id)) {
            return back();
        }

        $replies = $this->replySupportService->getAllBySupportId($support->id);

        return view('admin.supports.replies.replies', compact('support', 'replies'));
    }

    public function store(Request $request, string $id)
    {
        $request['support_id'] = $id;

        $this->replySupportService->create(
            CreateReplyDTO::makeFromRequest($request)
        );

        return redirect()
            ->route('replies.index', $id)
            ->with('message', 'Resposta criada!');
    }

    public function destroy(string $supportId, string $id)
    {
        if(!$this->replySupportService->delete($id)) {
            return redirect()
                ->route('replies.index', $supportId)
                ->with('message', 'Erro ao deletar a resposta');
        }

        return redirect()
            ->route('replies.index', $supportId)
            ->with('message', 'Resposta deletada!');
    }
}
