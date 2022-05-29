<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Services\Entities\Gallery;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Requests\GalleryRequest;
use Modules\Services\Repositories\GalleryRepository;

class GalleriesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var GalleryRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;


    /**
     * ServiceController constructor.
     *
     * @param GalleryRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->middleware('permission:read_galleries')->only(['index']);
        $this->middleware('permission:create_galleries')->only(['create', 'store']);
        $this->middleware('permission:update_galleries')->only(['edit', 'update']);
        $this->middleware('permission:delete_galleries')->only(['destroy']);
        $this->middleware('permission:show_galleries')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $galleries = $this->repository->all();
        $services = Service::listsTranslations('name')->pluck('name', 'id')->toArray();

        return view('services::galleries.index', compact('galleries', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $services = Service::listsTranslations('name')->pluck('name', 'id')->toArray();
        return view('services::galleries.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GalleryRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(GalleryRequest $request)
    {
        $gallery = $this->repository->create($request->all());

        flash(trans('services::galleries.messages.created'))->success();

        return redirect()->route('dashboard.galleries.show', $gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Gallery $gallery)
    {
        $gallery = $this->repository->find($gallery);

        return view('services::galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Application|Factory|View
     */
    public function edit(Gallery $gallery)
    {
        $services = Service::listsTranslations('name')->pluck('name', 'id')->toArray();
        return view('services::galleries.edit', compact('gallery', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GalleryRequest $request
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $gallery = $this->repository->update($gallery, $request->all());

        flash(trans('services::galleries.messages.updated'))->success();

        return redirect()->route('dashboard.galleries.show', $gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Gallery $gallery)
    {
        $this->repository->delete($gallery);

        flash(trans('services::services.messages.deleted'))->error();

        return redirect()->route('dashboard.services.index');
    }
}
