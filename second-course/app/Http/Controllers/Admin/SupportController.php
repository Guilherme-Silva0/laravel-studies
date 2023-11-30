<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            $request->get('page', 1),
            $request->get('per_page', 1), //For debug
            $request->filter
        );

        $filters = isset($request->filter) ? ['filter' => $request->get('filter', '')] : '';

        return view('admin.supports.index', compact('supports', 'filters'));
    }

    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->create(
            CreateSupportDTO::makeFromRequest($request)
        );
        
        return redirect()->route('supports.index');
    }

    public function edit(String $id)
    {
        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, String|Int $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if(!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(String $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
