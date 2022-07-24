<?php

namespace Modules\Settings\Http\Controllers\Dashboard;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\AboutUs;

class AboutUsController extends Controller
{

    public function form()
    {
        $about = AboutUs::first();
        return view('settings::settings.tabs.about', compact('about'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except('_token', 'map_address');
        $location_arr = explode(",", $request->map_address);
        $inputs["latitude"] = $location_arr[0];
        $inputs["longitude"] = $location_arr[1];

        $about = AboutUs::first();
        if ($about) {
            $about->update($inputs);
        } else {
            $about = AboutUs::create($inputs);
        }

        $about->addAllMediaFromTokens();

        flash(trans('settings::settings.messages.update_about'))->success();

        return redirect()->back();
    }


}
