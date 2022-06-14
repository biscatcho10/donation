<?php

namespace Modules\Donations\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Donations\Entities\DonationData;
use Modules\Donations\Http\Requests\DonationDataRequest;

class DonationsController extends Controller
{

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
}
