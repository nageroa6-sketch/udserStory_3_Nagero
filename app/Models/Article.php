
<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected static function booted()
    {
        // Global Scope per gli articoli accettati
        static::addGlobalScope('accepted', function (Builder $builder) {
            $builder->where('is_accepted', true);
        });
    }

    public function scopeToBeReviewed($query)
    {
        return $query->where('is_accepted', false); 
    }
}