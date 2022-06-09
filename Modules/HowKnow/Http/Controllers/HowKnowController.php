<?php

namespace Modules\HowKnow\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\HowKnow\Entities\Reason;
use Modules\HowKnow\Http\Requests\ReasonRequest;
use Modules\HowKnow\Repositories\ReasonRepository;

class HowKnowController extends Controller
{
    /**
     * The repository instance.
     *
     * @var ReasonRepository
     */
    private $repository;

    /**
     * AdminController constructor.
     *
     * @param ReasonRepository $repository
     */
    public function __construct(ReasonRepository $repository)
    {
        $this->middleware('permission:read_reasons')->only(['index']);
        $this->middleware('permission:create_reasons')->only(['create', 'store']);
        $this->middleware('permission:update_reasons')->only(['edit', 'update']);
        $this->middleware('permission:delete_reasons')->only(['destroy']);
        $this->middleware('permission:show_reasons')->only(['show']);
        $this->middleware('permission:sort_reasons')->only(['sort']);
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reasons = $this->repository->all();
        return view('howknow::index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('howknow::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ReasonRequest $request)
    {
        $reason = $this->repository->create($request->all());

        flash(trans('howknow::reasons.messages.created'))->success();

        return redirect()->route('dashboard.reasons.show', $reason);
    }

    /**
     * Show the specified resource.
     * @param Reason $reason
     * @return Renderable
     */
    public function show(Reason $reason)
    {
        $reason = $this->repository->find($reason);

        return view('howknow::show', compact('reason'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Reason $reason
     * @return Renderable
     */
    public function edit(Reason $reason)
    {
        return view('howknow::edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Reason $reason
     * @return Renderable
     */
    public function update(ReasonRequest $request, Reason $reason)
    {
        $reason = $this->repository->update($reason, $request->all());

        flash(trans('howknow::reasons.messages.updated'))->success();

        return redirect()->route('dashboard.reasons.show', $reason);
    }

    /**
     * Soft delete the specified resource from storage.
     * @param Reason $reason
     * @return Renderable
     */
    public function destroy(Reason $reason)
    {
        $this->repository->delete($reason);

        flash(trans('howknow::reasons.messages.deleted'))->error();

        return redirect()->route('dashboard.reasons.index');
    }


    /**
     *  Display a listing of the trashed resource.
     * @param Reason $reason
     * @return Renderable
     */
    public function trashed()
    {
        $reasons = $this->repository->trashed();
        return view('howknow::trashed', compact('reasons'));
    }

    /**
     * force delete the specified resource from storage.
     * @param Reason $reason
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $reason = Reason::withTrashed()->find($id);

        $this->repository->forceDelete($reason);

        flash(trans('howknow::reasons.messages.fdeleted'))->error();

        return redirect()->route('dashboard.reasons.trashed');
    }

    /**
     * Restore the specified resource from storage.
     * @param Reason $reason
     * @return Renderable
     */
    public function restore($id)
    {
        $reason = Reason::withTrashed()->find($id);

        $this->repository->restore($reason);

        flash(trans('howknow::reasons.messages.restored'))->success();

        return redirect()->route('dashboard.reasons.trashed');
    }
}
