<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\Partner;

class PartnerService
{

    public function getAllCategories()
    {
        $query = Partner::query();
        return $query->get();
    }

    public function storePartner(array $partnerData): Partner
    {
        return DB::transaction(function () use ($partnerData) {
            $partner = Partner::create($partnerData);

            return $partner;
        });
    }

    public function getPartnerById(int $id)
    {
        return Partner::findOrFail($id);
    }

    public function updatePartner(int $id, array $partnerData)
    {
        $partner = $this->getPartnerById($id);

        return DB::transaction(function () use ($partner, $partnerData) {
            $partner->update($partnerData);
            return $partner;
        });
    }

    public function deletePartner(int $id)
    {
        return DB::transaction(function () use ($id) {
            $partner = $this->getPartnerById($id);
            $partner->delete();
            return true;
        });
    }
}
