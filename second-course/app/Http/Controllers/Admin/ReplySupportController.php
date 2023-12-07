<?php

namespace App\Http\Controllers\Admin;

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

        dd($replies);

        return view('admin.supports.replies.replies', compact('support', 'replies'));
    }
}
