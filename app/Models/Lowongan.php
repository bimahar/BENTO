<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongan';
    protected $guarded = ['id'];

    public function gambar()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        } else {
            return asset('images/bentoKopi1.png');
        }
    }

    protected function casts(): array
    {
        return [
            'tanggal_buka' => 'datetime',
            'tanggal_tutup' => 'datetime',

        ];
    }
}
