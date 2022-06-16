<?php

namespace Modules\Donations\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Donations\Entities\Donor;
use Modules\Donations\Http\Requests\DonorRequest;
use Modules\Donations\Repositories\DonorRepository;

class DonorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var DonorRepository
     */
    private $repository;


    /**
     * CountryController constructor.
     *
     * @param DonorRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(DonorRepository $repository)
    {
        $this->middleware('permission:read_donors')->only(['index']);
        $this->middleware('permission:create_donors')->only(['create', 'store']);
        $this->middleware('permission:update_donors')->only(['edit', 'update']);
        $this->middleware('permission:delete_donors')->only(['destroy']);
        $this->middleware('permission:show_donors')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $donors = $this->repository->all();

        return view('donations::donors.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('donations::donors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(DonorRequest $request)
    {
        $donor = $this->repository->create($request->all());

        flash(trans('donations::donors.messages.created'))->success();

        return redirect()->route('dashboard.donors.show', $donor);
    }

    /**
     * Display the specified resource.
     *
     * @param Donor $donor
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Donor $donor)
    {
        $donor = $this->repository->find($donor);

        $donations = $donor->donations()->paginate(8);

        return view('donations::donors.show', compact('donor', 'donations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Donor $donor
     * @return Application|Factory|View
     */
    public function edit(Donor $donor)
    {
        return view('donations::donors.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Donor $donor
     * @return RedirectResponse
     */
    public function update(DonorRequest $request, Donor $donor)
    {
        $donor = $this->repository->update($donor, $request->all());

        flash(trans('donations::donors.messages.updated'))->success();

        return redirect()->route('dashboard.donors.show', $donor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Donor $donor
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Donor $donor)
    {
        $this->repository->delete($donor);

        flash(trans('donations::donors.messages.deleted'))->error();

        return redirect()->route('dashboard.donors.index');
    }
}
