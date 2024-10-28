<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\CCMS\Models\Category;

class CategoryService
{

    public function getAllCategories()
    {
        $query = Category::query();
        return $query->get();
    }

    public function storeCategory(array $categoryData): Category
    {
        return DB::transaction(function () use ($categoryData) {
            $category = Category::create($categoryData);

            return $category;
        });
    }

    public function getCategoryById(int $id)
    {
        return Category::findOrFail($id);
    }

    public function updateCategory(int $id, array $categoryData)
    {
        $category = $this->getCategoryById($id);

        return DB::transaction(function () use ($category, $categoryData) {
            $category->update($categoryData);
            return $category;
        });
    }

    public function deleteCategory(int $id)
    {
        return DB::transaction(function () use ($id) {
            $category = $this->getCategoryById($id);
            $category->delete();
            return true;
        });
    }
}
