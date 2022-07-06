<?php

namespace Modules\Donations\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Donations\Entities\DonationMethod;
use Modules\Donations\Http\Requests\DonationMethodRequest;
use Modules\Donations\Repositories\DonationMethodRepository;

class DonationMethodsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var DonationMethodRepository
     */
    private $repository;


    /**
     * CountryController constructor.
     *
     * @param DonationMethodRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(DonationMethodRepository $repository)
    {
        $this->middleware('permission:read_methods')->only(['index']);
        $this->middleware('permission:create_methods')->only(['create', 'store']);
        $this->middleware('permission:update_methods')->only(['edit', 'update']);
        $this->middleware('permission:delete_methods')->only(['destroy']);
        $this->middleware('permission:show_methods')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $methods = $this->repository->all();

        return view('donations::methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('donations::methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(DonationMethodRequest $request)
    {
        $method = $this->repository->create($request->all());

        flash(trans('donations::methods.messages.created'))->success();

        return redirect()->route('dashboard.donation-methods.show', $method);
    }

    /**
     * Display the specified resource.
     *
     * @param DonationMethod $donation_method
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(DonationMethod $donation_method)
    {
        $method = $this->repository->find($donation_method);

        return view('donations::methods.show', compact('method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DonationMethod $donation_method
     * @return Application|Factory|View
     */
    public function edit(DonationMethod $donation_method)
    {
        $method = $donation_method;
        return view('donations::methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param DonationMethod $donation_method
     * @return RedirectResponse
     */
    public function update(DonationMethodRequest $request, DonationMethod $donation_method)
    {
        $method = $this->repository->update($donation_method, $request->all());

        flash(trans('donations::methods.messages.updated'))->success();

        return redirect()->route('dashboard.donation-methods.show', $method);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DonationMethod $donation_method
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(DonationMethod $donation_method)
    {
        $this->repository->delete($donation_method);

        flash(trans('donations::methods.messages.deleted'))->error();

        return redirect()->route('dashboard.donation-methods.index');
    }
}
