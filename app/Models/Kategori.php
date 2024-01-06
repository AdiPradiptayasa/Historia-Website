<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;
    public $primaryKey='kategori_id';
    protected $table = 'kategoris'; 
    protected $fillable = [
        'kategori_name','kategori_desc'
    ];
    public function history(){
        return $this->hasMany(History::class,'sjrh_id','sjrh_id');
    }

    public function getSlugAttribute()
        {
            return Str::slug($this->sejarah_nama); // Gantilah 'sjrh_nama' sesuai dengan kolom yang ingin digunakan sebagai dasar slug
        }
    protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($kontribusi) {
                $kontribusi->slug = Str::slug($kontribusi->sejarah_nama);
            });
        }

}
