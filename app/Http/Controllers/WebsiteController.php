<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Modules\CCMS\Models\Page;

class WebsiteController extends Controller
{
    private $path;
    public function __construct()
    {
        $this->path = config('app.client');
    }

    public function home()
    {
        // $data['slider'] = Sliders::first();
        // $data['message'] = Articles::where('alias', 'message-from-president')->first();
        // $data['why_choose_us'] = Articles::where('alias', 'why-choose-us')->first();
        // $data['institutions'] = Institutions::orderBy('display_order', 'asc')->select('title', 'logo', 'alias')->get();
        // $data['events'] = Events::latest()->take(3)->select('title', 'alias', 'location', 'startdate', 'enddate', 'thumb')->get();
        // $data['committees'] = Teams::orderBy('display_order', 'asc')->take(4)->get();
        // $data['universities'] = Universities::orderBy('display_order', 'asc')->select('title', 'logo')->get();

        $page = $data['page'] = self::getPageWithChildrenBySlug(parent: null, slug: '/');
        
        if (!$page) {
            return view("client.$this->path.errors.404");
        }

        $path = "client.$this->path.pages.$page->template";

        if (!View::exists($path)) {
            return view("client.$this->path.errors.404");
        }

        return view($path, $data);
    }

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
    //         return view("client.$this->path.errors.404");
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
    //         return view("client.$this->path.errors.404");
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
    //         return view("client.$this->path.errors.404");
    //     }

    //     return view("client.$this->path.pages.events.single", $data);
    // }

    public function loadPage(?string $parent = null, ?string $slug = null)
    {
        if ($slug === null) {
            $slug = $parent;
            $parent = null;
        }

        $page = self::getPageWithChildrenBySlug($parent, $slug);

        if (!$page) {
            return view("client.$this->path.errors.404");
        }

        $path = "client.$this->path.pages.$page->template";

        if (!View::exists($path)) {
            return view("client.$this->path.errors.404");
        }

        return view($path, $page);
    }

    public function fallback()
    {
        return view("client.$this->path.errors.404");
    }

    private function getPageWithChildrenBySlug(?string $parent, ?string $slug)
    {
        $page = Page::where([
            'status' => 1,
            'type' => 'page',
            'slug' => $slug,
        ])->when($parent, function ($query) use ($parent) {
            $query->where('parent', $parent);
        })->with('children')->first();

        return $page;
    }
}
