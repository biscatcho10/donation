<?php

namespace Modules\Volunteers\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Volunteer\Repositories\VolunteerRepository;
use Modules\Volunteers\Entities\Volunteer;
use Modules\Volunteers\Http\Requests\VolunteerRequest;

class VolunteersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var VolunteerRepository
     */
    private $repository;

    /**
     * VolunteerController constructor.
     * @param VolunteerRepository $repository
     */
    public function __construct(VolunteerRepository $repository)
    {
        $this->middleware('permission:read_volunteers')->only(['index']);
        $this->middleware('permission:create_volunteers')->only(['create', 'store']);
        $this->middleware('permission:update_volunteers')->only(['edit', 'update']);
        $this->middleware('permission:delete_volunteers')->only(['destroy']);
        $this->middleware('permission:show_volunteers')->only(['show']);
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $volunteers = $this->repository->all();

        return view('volunteers::volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|View
     */
    public function create()
    {
        return view('volunteers::volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param VolunteerRequest $request
     * @return RedirectResponse
     */
    public function store(VolunteerRequest $request)
    {
        $volunteer = $this->repository->create($request->all());

        flash(trans('volunteers::volunteers.messages.created'))->success();

        return redirect()->route('dashboard.volunteers.show', $volunteer);
    }

    /**
     * Show the specified resource.
     * @param Volunteer $volunteer
     * @return Factory|View
     */
    public function show(Volunteer $volunteer)
    {
        $volunteer = $this->repository->find($volunteer);

        return view('volunteers::volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Volunteer $volunteer
     * @return Factory|View
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteers::volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     * @param VolunteerRequest $request
     * @param Volunteer $volunteer
     * @return RedirectResponse
     */
    public function update(VolunteerRequest $request, Volunteer $volunteer)
    {
        $volunteer = $this->repository->update($volunteer, $request->all());

        flash(trans('volunteers::volunteers.messages.updated'))->success();

        return redirect()->route('dashboard.volunteers.show', $volunteer);
    }

    /**
     * Remove the specified resource from storage.
     * @param Volunteer $volunteer
     * @return RedirectResponse
     */
    public function destroy(Volunteer $volunteer)
    {
        $this->repository->delete($volunteer);

        flash(trans('volunteers::volunteers.messages.deleted'))->error();

        return redirect()->route('dashboard.volunteers.index');
    }
}
