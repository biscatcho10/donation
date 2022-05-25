<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Requests\ServiceRequest;
use Modules\Services\Repositories\ServiceRepository;

class ServicesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var ServiceRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;


    /**
     * ServiceController constructor.
     *
     * @param ServiceRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(ServiceRepository $repository)
    {
        $this->middleware('permission:read_services')->only(['index']);
        $this->middleware('permission:create_services')->only(['create', 'store']);
        $this->middleware('permission:update_services')->only(['edit', 'update']);
        $this->middleware('permission:delete_services')->only(['destroy']);
        $this->middleware('permission:show_services')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = $this->repository->all();

        return view('services::services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('services::services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(ServiceRequest $request)
    {
        $service = $this->repository->create($request->all());

        flash(trans('services::services.messages.created'))->success();

        return redirect()->route('dashboard.services.show', $service);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Service $service)
    {
        $service = $this->repository->find($service);

        return view('services::services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('services::services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $service = $this->repository->update($service, $request->all());

        flash(trans('services::services.messages.updated'))->success();

        return redirect()->route('dashboard.services.show', $service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Service $service)
    {
        $this->repository->delete($service);

        flash(trans('services::services.messages.deleted'))->error();

        return redirect()->route('dashboard.services.index');
    }
}
