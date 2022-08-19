<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $perPage = self::perPage;

    const perPage = 12;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'status' // default true only admin can change it
    ];

    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'App\Utilities\TicketFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
