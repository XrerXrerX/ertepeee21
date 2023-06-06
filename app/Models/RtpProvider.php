<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtpProvider extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // menggunkaan coalition
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('gambar', 'like', '%' . $search . '%');
        });
    }
}
