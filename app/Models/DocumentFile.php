<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'commune_id',
        'documents'
    ];

    /**
     * Get the DocumentFile associated with the item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the DocumentFile associated with the commune.
     */
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
