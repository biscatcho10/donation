<?php

namespace Modules\Services\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Services\Entities\Service;
use Modules\Services\Entities\SubService;
use Modules\Services\Http\Requests\SubServiceRequest;
use Modules\Services\Repositories\SubServiceRepository;

class SubServicesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var SubServiceRepository
     */
    private $repository;


    /**
     * ServiceController constructor.
     *
     * @param SubServiceRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(SubServiceRepository $repository)
    {
        $this->middleware('permission:read_subservices')->only(['index']);
        $this->middleware('permission:create_subservices')->only(['create', 'store']);
        $this->middleware('permission:update_subservices')->only(['edit', 'update']);
        $this->middleware('permission:delete_subservices')->only(['destroy']);
        $this->middleware('permission:show_subservices')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Service $service)
    {
        $subservices = $this->repository->all($service);
        return view('services::services.show', compact('service', 'subservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Service $service)
    {
        return view('services::subservices.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubServiceRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(SubServiceRequest $request, Service $service)
    {
        $sub_service = $this->repository->create($service, $request->all());

        flash(trans('services::subservices.messages.created'))->success();

        return redirect()->route('dashboard.subservices.show', [$service, $sub_service]);
    }

    /**
     * Display the specified resource.
     *
     * @param SubService $sub_service
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Service $service, SubService $subservice)
    {
        $sub_service = $this->repository->find($subservice);

        return view('services::subservices.show', compact('service', 'sub_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SubService $sub_service
     * @return Application|Factory|View
     */
    public function edit(Service $service, SubService $subservice)
    {
        return view('services::subservices.edit', compact('service', 'subservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubServiceRequest $request
     * @param SubService $sub_service
     * @return RedirectResponse
     */
    public function update(SubServiceRequest $request, Service $service, SubService $subservice)
    {
        $sub_service = $this->repository->update($subservice, $request->all());

        flash(trans('services::subservices.messages.updated'))->success();

        return redirect()->route('dashboard.subservices.show', [$service, $sub_service]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SubService $sub_service
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Service $service, SubService $subservice)
    {
        $this->repository->delete($subservice);

        flash(trans('services::subservices.messages.deleted'))->error();

        return redirect()->route('dashboard.services.show', $service);
    }
}
