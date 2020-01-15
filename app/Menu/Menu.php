<?php

namespace App\Menu;

use App\Menu as menuWeb;
use Illuminate\Support\Facades\Auth;

class Menu 
{
    public function sayHello()
    {
        return 'Hello Bro';
    }

    public function getRoles()
    {
        // mendapatkan roles untuk user
        return Auth::user()->roles;
    }

    public function getMenus()
    {
        // mendapatkan menu user->roles->menus
        $collect = collect();
        $role = Auth::user()->roles;
        $menu = $role->each(function($item, $key)use($collect){
            $item->menus->each(function($item1, $key1)use($collect){
                $collect->push([
                    'id'=>$item1->id, 
                    'label'=>$item1->label, 
                    'kode'=>$item1->kode]);
            });
        });
        return $collect->sortByDesc('id');
    }
}