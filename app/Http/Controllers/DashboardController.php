<?php

namespace App\Http\Controllers;

use App\Models\User;
use Modules\CCMS\Models\Blog;
use Modules\CCMS\Models\Partner;
use Modules\CCMS\Models\Service;
use Modules\CCMS\Models\Team;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard',[
            'usersCount' => User::count(),
            'blogsCount' => Blog::where('status', 1)->count(),
            'teamsCount' => Team::where('status', 1)->count(),
            'servicesCount' => Service::where('status', 1)->count(),
            'partnersCount' => Partner::where('status', 1)->count(),
        ]);
    }
}
