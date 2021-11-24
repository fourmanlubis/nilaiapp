<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    
     protected $table = "tblnilai";

    protected $fillable = ["nim","matakuliah_id","nilai"];

    /**
     * Get the matakuliah that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matakuliah()
    {
        return $this->belongsTo(\App\Models\MataKuliah::class);
    }

    /**
     * Get the mahasiswa that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mahasiswa()
    {
        return $this->belongsTo(\App\Models\Mahasiswa::class, 'nim', 'nim');
    }
}
