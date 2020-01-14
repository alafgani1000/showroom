<?php
namespace App\Menu;

use Illuminate\Support\Facades\Facade;

class MenuFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }
}