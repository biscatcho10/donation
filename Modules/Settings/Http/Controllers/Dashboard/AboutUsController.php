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
        $about = AboutUs::first();
        if ($about) {
            $about->update($request->all());
        } else {
            $about = AboutUs::create($request->all());
        }

        $awards = [];
        if($request->has('awards') && $request->awards[0]['link'] != null){
            foreach ($request->awards as $award) {
                $awards[] = $award['link'];
            }
        }else{
            $awards = null;
        }

        $about->awards = $awards;
        $about->save();

        $about->addAllMediaFromTokens();
        return redirect()->back()->with('success', trans("settings::settings.messages.update_about"));
    }


}
