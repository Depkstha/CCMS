<?php
namespace Modules\Menu\Repositories;

use Modules\Menu\Interfaces\MenuInterface;
use Modules\Menu\Models\Menu;

class MenuRepository implements MenuInterface
{
    public function findAll()
    {
        return Menu::orderBy('order')->get();
    }

    public function findOne($menuId)
    {
        return Menu::findOrFail($menuId);
    }

    public function create($menuDetails)
    {
        return Menu::create($menuDetails);
    }

    public function update($menuId, array $newDetails)
    {
        return Menu::whereId($menuId)->update($newDetails);
    }

    public function delete($menuId)
    {
        return Menu::destroy($menuId);
    }

    public function pluck()
    {
        return Menu::pluck('title', 'id');
    }

}
