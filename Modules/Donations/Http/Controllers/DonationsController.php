<?php

namespace Modules\Donations\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Donations\Entities\Donation;
use Modules\Donations\Entities\DonationData;
use Modules\Donations\Entities\Donor;
use Modules\Donations\Http\Filters\DonationFilter;
use Modules\Donations\Http\Requests\DonationDataRequest;
use Modules\Services\Entities\Service;

class DonationsController extends Controller
{

    public function __construct(DonationFilter $filter)
    {
        $this->filter = $filter;
    }



    public function getForm()
    {
        $data = DonationData::first();
        return view('donations::donations.donation-data', compact('data'));
    }


    public function saveData(DonationDataRequest $request)
    {
        $data = DonationData::updateOrCreate(
            ['id' => 1],
            [
                'title:en' => request('title:en'),
                'title:ar' => request('title:ar'),
                'description:en' => request('description:en'),
                'description:ar' => request('description:ar'),
                'thanks_msg:en' => request('thanks_msg:en'),
                'thanks_msg:ar' => request('thanks_msg:ar')
            ]
        );

        flash(trans('donations::donors.messages.data_updated'))->success();

        return redirect()->back();
    }


    public function index()
    {
        $donors = Donor::pluck('name', 'id')->toArray();
        $services = Service::listsTranslations('name')->pluck('name', 'id')->toArray();
        $donations = Donation::filter($this->filter)->paginate(request('perPage'));
        return view('donations::donations.index', compact('donations', 'donors', 'services'));
    }


    public function show(Donation $donation)
    {
        return view('donations::donations.show', compact('donation'));
    }


    public function destroy(Donation $donation)
    {
        $donation->delete();

        flash(trans('donations::donations.messages.deleted'))->success();

        return redirect()->route('dashboard.donations.index');
    }
}
