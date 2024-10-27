<?php
namespace Modules\Menu\Interfaces;

interface MenuInterface
{
    public function findAll();
    public function findOne($menuId);
    public function create($menuDetails);
    public function update($menuId, array $newDetails);
    public function delete($menuId);
    public function pluck();
}
