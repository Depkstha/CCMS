<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\CCMS\Models\Gallery;

class GalleryService
{

    public function getAllGalleries()
    {
        $query = Gallery::query();
        return $query->get();
    }

    public function storeGallery(array $galleryData): Gallery
    {
        return DB::transaction(function () use ($galleryData) {
            $gallery = Gallery::create($galleryData);

            return $gallery;
        });
    }

    public function getGalleryById(int $id)
    {
        return Gallery::findOrFail($id);
    }

    public function updateGallery(int $id, array $galleryData)
    {
        $gallery = $this->getGalleryById($id);

        return DB::transaction(function () use ($gallery, $galleryData) {
            $gallery->update($galleryData);
            return $gallery;
        });
    }

    public function deleteGallery(int $id)
    {
        return DB::transaction(function () use ($id) {
            $gallery = $this->getGalleryById($id);
            $gallery->delete();
            return true;
        });
    }
}
