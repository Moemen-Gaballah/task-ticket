<?php
namespace App\Utilities\TicketFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;


class Category extends QueryFilter implements FilterContract
{

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->whereHas('category', function ($q) use ($value) {
            return $q->whereIn('category_id', $value);
        });
    }



}
