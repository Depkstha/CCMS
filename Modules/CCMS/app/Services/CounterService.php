<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\Counter;

class CounterService
{

    public function getAllCategories()
    {
        $query = Counter::query();
        return $query->get();
    }

    public function storeCounter(array $counterData): Counter
    {
        return DB::transaction(function () use ($counterData) {
            $counter = Counter::create($counterData);

            return $counter;
        });
    }

    public function getCounterById(int $id)
    {
        return Counter::findOrFail($id);
    }

    public function updateCounter(int $id, array $counterData)
    {
        $counter = $this->getCounterById($id);

        return DB::transaction(function () use ($counter, $counterData) {
            $counter->update($counterData);
            return $counter;
        });
    }

    public function deleteCounter(int $id)
    {
        return DB::transaction(function () use ($id) {
            $counter = $this->getCounterById($id);
            $counter->delete();
            return true;
        });
    }
}
