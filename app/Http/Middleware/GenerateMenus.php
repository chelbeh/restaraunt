<?php

namespace App\Http\Middleware;

use App\App;
use App\Page;
use Closure;
use Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('mainMenu', function ($menu) {
            $pages = Page::all();
          //  dd($pages);
            foreach ($pages as $page) {
                $menu->add($page->name, $page->url);
            }

        });

        Menu::make('appsMenu', function ($menu) {
            $pages = App::all();

            foreach ($pages as $page) {
                $menu->add($page->name, $page->url);
            }

        });

        return $next($request);
    }
}
