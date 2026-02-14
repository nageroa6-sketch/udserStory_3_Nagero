<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titolo', 'descrizione', 'prezzo', 'citta', 'categoria', 'user_id'
    ];

    protected $casts = [
        'prezzo' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeInAttesa($query)
    {
        return $query->where('stato', 'in_attesa');
    }

    public function scopeApprovati($query)
    {
        return $query->where('stato', 'approvato');
    }

    public function approva()
    {
        $this->stato = 'approvato';
        $this->save();
    }

    public function elimina()
    {
        $this->stato = 'rifiutato';
        $this->save();
    }

    public static function annullaUltima()
    {
        $ultimo = self::where('stato', '!=', 'in_attesa')->latest()->first();
        if ($ultimo) {
            $ultimo->stato = 'in_attesa';
            $ultimo->save();
        }
    }
}
