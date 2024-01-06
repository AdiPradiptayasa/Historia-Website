<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kontribusi extends Model

    {
        use HasFactory;
        protected $primaryKey = 'sejarah_id';
        protected $table = 'kontribusis';
        protected $fillable = [
            'kategori_id','sejarah_nama','sejarah_subjudul', 'sejarah_desc','sejarah_img'
        ];
        public function kategori(){
            return $this->belongsTo(Kategori::class,'kategori_id','kategori_id');
        }
    static function getKontribusi(){
            $return=DB::table('kontribusis')
            ->join('kategoris','kontribusis .kategori_id', '=', 'kategoris.kategori_id')
            ->get();
            return $return; 

        }
        public function getSlugAttribute()
        {
            return Str::slug($this->sejarah_nama); // Gantilah 'sejarah_nama' sesuai dengan kolom yang ingin digunakan sebagai dasar slug
        }
        protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($kontribusi) {
                $kontribusi->slug = Str::slug($kontribusi->sejarah_nama);
            });
        }
        public function up()
        {
            Schema::table('kontribusis', function (Blueprint $table) {
                $table->string('slug')->unique()->after('sejarah_nama')->nullable();
            });
        }
}
