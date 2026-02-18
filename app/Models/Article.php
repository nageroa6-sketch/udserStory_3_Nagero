<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'is_accepted', 'user_id',
    ];

    protected $casts = [
        'is_accepted' => 'boolean',
    ];

    // Relazione autore
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Global Scope: solo accettati visibili al pubblico
   
   
   




    protected static function booted()
{
    static::addGlobalScope('accepted', fn($q) => $q->where('is_accepted', true));
}











public function scopeToReview($query)
{
    return $query->whereNull('is_accepted');
}}