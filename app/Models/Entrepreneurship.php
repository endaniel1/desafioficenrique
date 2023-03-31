<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneurship extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'commune_id',
        'document_file_id',
        'description',
        'status'
    ];    

    /**
     * Get the DocumentFile associated with the item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the Entrepreneurship associated with the commune.
     */
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    /**
     * Get the Entrepreneurship associated with the documentFile.
     */
    public function documentFile()
    {
        return $this->belongsTo(DocumentFile::class);
    }


}
