<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\FaqCategory;

class FaqCategoryService
{

    public function getAllFaqCategories()
    {
        $query = FaqCategory::query();
        return $query->get();
    }

    public function storeFaqCategory(array $faqCategoryData): FaqCategory
    {
        return DB::transaction(function () use ($faqCategoryData) {
            $faqCategory = FaqCategory::create($faqCategoryData);

            return $faqCategory;
        });
    }

    public function getFaqCategoryById(int $id)
    {
        return FaqCategory::findOrFail($id);
    }

    public function updateFaqCategory(int $id, array $faqCategoryData)
    {
        $faqCategory = $this->getFaqCategoryById($id);

        return DB::transaction(function () use ($faqCategory, $faqCategoryData) {
            $faqCategory->update($faqCategoryData);
            return $faqCategory;
        });
    }

    public function deleteFaqCategory(int $id)
    {
        return DB::transaction(function () use ($id) {
            $faqCategory = $this->getFaqCategoryById($id);
            $faqCategory->delete();
            return true;
        });
    }
}
