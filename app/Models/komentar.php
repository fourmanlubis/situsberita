<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    
    protected $table = "tblkomemtar"; 
    protected $fillable = ["isi_komentar","berita_id","user_id"];
    
    /**
     * Get the user that owns the Berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id')->latest();
    }
}
