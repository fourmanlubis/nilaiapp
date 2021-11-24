<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    
    protected $table = "tblmahasiswa";

    protected $fillable = ["nim","nama","alamat","telepon","email"];

    protected $primaryKey = "nim";

    protected $keyType="string";
}
