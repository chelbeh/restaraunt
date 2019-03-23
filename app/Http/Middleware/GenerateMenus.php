<?php

namespace App\Http\Middleware;

use App\App;
use App\Page;
use Closure;
use Illuminate\Http\Request;
use Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('mainMenu', function ($menu) {
            $pages = Page::all();

            foreach ($pages as $page) {
                $element = $menu->add($page->name, $page->url);
                $element->link->attr(['class' => 'nav-item nav-link', 'id' => 'menu-anchor-' . $page->url, 'href' => '#']);
            }
        });

        Menu::make('appsMenu', function ($menu) {
            $pages = App::all();

            foreach ($pages as $page) {
                $element = $menu->add($page->name, $page->url);
                $element->link->attr(['class' => 'nav-item nav-link']);
            }
        });

        return $next($request);
    }
}
