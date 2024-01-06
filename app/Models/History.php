<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 

class History extends Model
    {
        use HasFactory;
        protected $primaryKey = 'sjrh_id';
        protected $table = 'historys';
        protected $fillable = [
            'kategori_id','sjrh_nama','sjrh_subjudul', 'sjrh_desc','sjrh_img','namespot','coordinates'
        ];
        public function kategori(){
            return $this->belongsTo(Kategori::class,'kategori_id','kategori_id');
        }
        static function getHistory(){
            $return=DB::table('historys')
            ->join('kategoris','historys.kategori_id', '=', 'kategoris.kategori_id')
            ->get();
            return $return; 

        }
        public function getSlugAttribute()
        {
            return Str::slug($this->sjrh_nama); // Gantilah 'sjrh_nama' sesuai dengan kolom yang ingin digunakan sebagai dasar slug
        }
        protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($history) {
                $history->slug = Str::slug($history->sjrh_nama);
            });
        }

    }
