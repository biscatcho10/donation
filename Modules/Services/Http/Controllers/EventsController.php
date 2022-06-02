<?php

namespace Modules\Services\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Services\Entities\Event;
use Modules\Services\Entities\Gallery;
use Modules\Services\Http\Requests\EventRequest;
use Modules\Services\Repositories\EventRepository;

class EventsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var EventRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;


    /**
     * ServiceController constructor.
     *
     * @param EventRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(EventRepository $repository)
    {
        $this->middleware('permission:read_events')->only(['index']);
        $this->middleware('permission:create_events')->only(['create', 'store']);
        $this->middleware('permission:update_events')->only(['edit', 'update']);
        $this->middleware('permission:delete_events')->only(['destroy']);
        $this->middleware('permission:show_events')->only(['show']);

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Gallery $gallery)
    {
        $events = $this->repository->all($gallery);
        return view('services::galleries.show', compact('gallery', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Gallery $gallery)
    {
        return view('services::events.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(EventRequest $request, Gallery $gallery)
    {
        $event = $this->repository->create($gallery, $request->all());

        flash(trans('services::events.messages.created'))->success();

        return redirect()->route('dashboard.events.show', [$gallery, $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param Event $event
     * @return Application|Factory|View
     * @throws AuthorizationException
     * @throws Exception
     */
    public function show(Gallery $gallery, Event $event)
    {
        $event = $this->repository->find($event);

        return view('services::events.show', compact('gallery', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Application|Factory|View
     */
    public function edit(Gallery $gallery, Event $event)
    {
        return view('services::events.edit', compact('gallery', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(EventRequest $request, Gallery $gallery, Event $event)
    {
        $event = $this->repository->update($event, $request->all());

        flash(trans('services::events.messages.updated'))->success();

        return redirect()->route('dashboard.events.show', [$gallery, $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Gallery $gallery, Event $event)
    {
        $this->repository->delete($event);

        flash(trans('services::services.messages.deleted'))->error();

        return redirect()->route('dashboard.services.index');
    }
}
