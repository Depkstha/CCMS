<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\Institution;

class InstitutionService
{

    public function getAllCategories()
    {
        $query = Institution::query();
        return $query->get();
    }

    public function storeInstitution(array $institutionData): Institution
    {
        return DB::transaction(function () use ($institutionData) {
            $institution = Institution::create($institutionData);

            return $institution;
        });
    }

    public function getInstitutionById(int $id)
    {
        return Institution::findOrFail($id);
    }

    public function updateInstitution(int $id, array $institutionData)
    {
        $institution = $this->getInstitutionById($id);

        return DB::transaction(function () use ($institution, $institutionData) {
            $institution->update($institutionData);
            return $institution;
        });
    }

    public function deleteInstitution(int $id)
    {
        return DB::transaction(function () use ($id) {
            $institution = $this->getInstitutionById($id);
            $institution->delete();
            return true;
        });
    }
}
