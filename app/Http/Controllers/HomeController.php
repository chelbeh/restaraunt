<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = $this->services();
        $images = $this->images();

        return view('home', ['services' => $services, 'images' => $images]);
    }

    /**
     * Return all services
     *
     * @return array
     */
    private function services()
    {
        return [
            0 => [
                'icon' => 'food',
                'header' => 'Вкусная еда',
                'text' => 'Мы готовим из свежих и качественных продуктов.',
            ],
            1 => [
                'icon' => 'event',
                'header' => 'Мероприятия',
                'text' => 'Мы проводим мероприятия, где никто вам не помешает',
            ],
            2 => [
                'icon' => 'order',
                'header' => 'Онлайн заказ',
                'text' => 'Закажите столик или ужин онлайн прямо сейчас',
            ],
            3 => [
                'icon' => 'delivery',
                'header' => 'Доставка',
                'text' => "При заказе на сумму от 5000 рублей - бесплатно",
            ],
        ];
    }

    /**
     * Get all images from gallery folder
     *
     * @return \Symfony\Component\Finder\SplFileInfo[]
     */
    private function images()
    {
        return File::allFiles(public_path('img/gallery'));
    }
}
