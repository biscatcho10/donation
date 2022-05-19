<?php

namespace Modules\Partners\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Partners\Entities\Partner;
use Modules\Partners\Http\Requests\PartnerRequest;
use Modules\Partners\Repositories\PartnerRepository;

class PartnersController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var PartnerRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;


    /**
     * CountryController constructor.
     *
     * @param PartnerRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(PartnerRepository $repository)
    {
        $this->middleware('permission:read_partners')->only(['index']);
        $this->middleware('permission:create_partners')->only(['create', 'store']);
        $this->middleware('permission:update_partners')->only(['edit', 'update']);
        $this->middleware('permission:delete_partners')->only(['destroy']);
        $this->middleware('permission:show_partners')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $partners = $this->repository->all();

        return view('partners::partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('partners::partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(PartnerRequest $request)
    {
        $partner = $this->repository->create($request->all());

        flash(trans('partners::partners.messages.created'))->success();

        return redirect()->route('dashboard.partners.show', $partner);
    }

    /**
     * Display the specified resource.
     *
     * @param Partner $partner
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Partner $partner)
    {
        $partner = $this->repository->find($partner);

        return view('partners::partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return Application|Factory|View
     */
    public function edit(Partner $partner)
    {
        return view('partners::partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        $partner = $this->repository->update($partner, $request->all());

        flash(trans('partners::partners.messages.updated'))->success();

        return redirect()->route('dashboard.partners.show', $partner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Partner $partner)
    {
        $this->repository->delete($partner);

        flash(trans('partners::partners.messages.deleted'))->error();

        return redirect()->route('dashboard.partners.index');
    }
}
