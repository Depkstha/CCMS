<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\GalleryCategory;

class GalleryCategoryService
{

    public function getAllgalleryCategories()
    {
        $query = GalleryCategory::query();
        return $query->get();
    }

    public function storeGalleryCategory(array $galleryCategoryData): GalleryCategory
    {
        return DB::transaction(function () use ($galleryCategoryData) {
            $galleryCategory = GalleryCategory::create($galleryCategoryData);

            return $galleryCategory;
        });
    }

    public function getGalleryCategoryById(int $id)
    {
        return GalleryCategory::findOrFail($id);
    }

    public function updateGalleryCategory(int $id, array $galleryCategoryData)
    {
        $galleryCategory = $this->getGalleryCategoryById($id);

        return DB::transaction(function () use ($galleryCategory, $galleryCategoryData) {
            $galleryCategory->update($galleryCategoryData);
            return $galleryCategory;
        });
    }

    public function deleteGalleryCategory(int $id)
    {
        return DB::transaction(function () use ($id) {
            $galleryCategory = $this->getGalleryCategoryById($id);
            $galleryCategory->delete();
            return true;
        });
    }
}
