<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Melamar extends Model
{
    use HasFactory;
    protected $table = 'melamar';
    protected $guarded = ['id'];

    public function lowongan(){
        return $this->belongsTo(Lowongan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $dates = ['tanggal_lahir'];

    public function getUmurAttribute(){
        return Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    public function getPasFoto()
    {
        return storage_path('app/public/' . $this->foto);
    }
    
    public function getPasCV()
    {
        return storage_path('app/public/' . $this->cv);
    }

}
