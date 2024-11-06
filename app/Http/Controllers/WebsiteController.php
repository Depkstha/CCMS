<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Blogs;
use App\Models\Courses;
use App\Models\Events;
use App\Models\Institutions;
use App\Models\Sliders;
use App\Models\Teams;
use App\Models\Universities;
use App\Rules\Recaptcha;
use CCMS;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{
    private $path;
    public function __construct()
    {
        $this->path = config('app.client');
    }

    // public function home()
    // {
    //     $data['slider'] = Sliders::first();
    //     $data['message'] = Articles::where('alias', 'message-from-president')->first();
    //     $data['why_choose_us'] = Articles::where('alias', 'why-choose-us')->first();
    //     $data['institutions'] = Institutions::orderBy('display_order', 'asc')->select('title', 'logo', 'alias')->get();
    //     $data['events'] = Events::latest()->take(3)->select('title', 'alias', 'location', 'startdate', 'enddate', 'thumb')->get();
    //     $data['committees'] = Teams::orderBy('display_order', 'asc')->take(4)->get();
    //     $data['universities'] = Universities::orderBy('display_order', 'asc')->select('title', 'logo')->get();

    //     return view("client.$this->path.pages.home", $data);
    // }

   

    // public function courseList()
    // {
    //     $data["courses"] = Courses::with('institution')->orderBy('title', 'asc')->paginate(12);
    //     return view("client.$this->path.pages.courses.index", $data);
    // }

    // public function courseSingle($institution, $alias)
    // {
    //     $course = $data["course"] = Courses::where('alias', $alias)
    //         ->whereHas('institution', function (Builder $query) use ($institution) {
    //             $query->where('alias', $institution);
    //         })->with('institution')->first();

    //     if (!$course) {
    //         return view("client.$this->path.pages.404");
    //     }

    //     return view("client.$this->path.pages.courses.single", $data);
    // }

    // public function blogList()
    // {
    //     $data["blogs"] = Blogs::orderBy('title', 'asc')->get();
    //     return view("client.$this->path.pages.blogs.index", $data);
    // }

    // public function blogSingle($alias)
    // {
    //     $blog = $data["blog"] = Blogs::where('alias', $alias)->first();

    //     if (!$blog) {
    //         return view("client.$this->path.pages.404");
    //     }

    //     return view("client.$this->path.pages.blogs.single", $data);
    // }

    // public function eventList()
    // {
    //     $data["events"] = Events::orderBy('title', 'asc')->latest()->paginate(6);
    //     return view("client.$this->path.pages.events.index", $data);
    // }

    // public function eventSingle($alias)
    // {
    //     $event = $data["event"] = Events::where('alias', $alias)->first();
    //     $data["recentEvents"] = Events::latest()->take(5)->get();

    //     if (!$event) {
    //         return view("client.$this->path.pages.404");
    //     }

    //     return view("client.$this->path.pages.events.single", $data);
    // }

    public function loadPage($parent, $slug)
    {
        dd($page);
        $data = [];

        // switch ($page) {

        //     case 'team':
        //         $data['teams'] = Teams::orderBy('display_order', 'asc')->get();
        //         $data['page'] = Articles::where('alias', $page)->first();

        //         break;

        //     case 'company-profile':
        //         $data['committees'] = Teams::orderBy('display_order', 'asc')->take(4)->get();
        //         $data['universities'] = Universities::orderBy('display_order', 'asc')->select('title', 'logo')->get();
        //         $data['page'] = Articles::where('alias', $page)->with('children')->first();

        //         break;

        //     default:
        //         $data['page'] = Articles::where('alias', $page)->first();
        // }

        // $path = "client.$this->path.pages.$page";

        // if (!View::exists($path)) {
        //     return view("client.$this->path.pages.404");
        // }

        // return view($path, $data);
    }

    public function fallback()
    {
        // return view("client.$this->path.pages.404");
    }
}
