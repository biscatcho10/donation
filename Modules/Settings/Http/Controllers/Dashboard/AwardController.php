<?php

namespace Modules\Settings\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Settings\Entities\Award;
use Modules\Settings\Http\Requests\AwardRequest;
use Modules\Settings\Repositories\AwardRepository;

class AwardController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var AwardRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     *
     * @param AwardRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(AwardRepository $repository)
    {
        $this->middleware('permission:read_awards')->only(['index']);
        $this->middleware('permission:create_awards')->only(['create', 'store']);
        $this->middleware('permission:update_awards')->only(['edit', 'update']);
        $this->middleware('permission:delete_awards')->only(['destroy']);
        $this->middleware('permission:show_awards')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $awards = $this->repository->all();

        return view('settings::awards.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('settings::awards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(AwardRequest $request)
    {
        $award = $this->repository->create($request->all());

        flash(trans('settings::awards.messages.created'))->success();

        return redirect()->route('dashboard.awards.show', $award);
    }

    /**
     * Display the specified resource.
     *
     * @param Award $award
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Award $award)
    {
        $award = $this->repository->find($award);

        return view('settings::awards.show', compact('award'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Award $award
     * @return Application|Factory|View
     */
    public function edit(Award $award)
    {
        return view('settings::awards.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Award $award
     * @return RedirectResponse
     */
    public function update(AwardRequest $request, Award $award)
    {
        $award = $this->repository->update($award, $request->all());

        flash(trans('settings::awards.messages.updated'))->success();

        return redirect()->route('dashboard.awards.show', $award);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Award $award
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Award $award)
    {
        $this->repository->delete($award);

        flash(trans('settings::awards.messages.deleted'))->error();

        return redirect()->route('dashboard.awards.index');
    }
}
