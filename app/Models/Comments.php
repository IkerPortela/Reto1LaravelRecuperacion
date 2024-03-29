<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;
    public function incidence(): BelongsTo{
        return $this->belongsTo(Incidence::class)->onDelete('cascade');
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
        }
}