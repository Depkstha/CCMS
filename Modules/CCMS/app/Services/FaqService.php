<?php

namespace Modules\CCMS\Services;

use Illuminate\Support\Facades\DB;
use Modules\CCMS\Models\Faq;

class FaqService
{

    public function getAllCategories()
    {
        $query = Faq::query();
        return $query->get();
    }

    public function storeFaq(array $faqData): Faq
    {
        return DB::transaction(function () use ($faqData) {
            $faq = Faq::create($faqData);

            return $faq;
        });
    }

    public function getFaqById(int $id)
    {
        return Faq::findOrFail($id);
    }

    public function updateFaq(int $id, array $faqData)
    {
        $faq = $this->getFaqById($id);

        return DB::transaction(function () use ($faq, $faqData) {
            $faq->update($faqData);
            return $faq;
        });
    }

    public function deleteFaq(int $id)
    {
        return DB::transaction(function () use ($id) {
            $faq = $this->getFaqById($id);
            $faq->delete();
            return true;
        });
    }
}
