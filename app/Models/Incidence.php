<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Incidence extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function comments(): HasMany {
        return $this->hasMany(Comments::class);
        }
        public function user(): BelongsTo{
            return $this->belongsTo(User::class);
        }
        public function category(): BelongsTo{
            return $this->belongsTo(Categories::class);
        }
        public function department(): BelongsTo{
            return $this->belongsTo(Department::class);
        }
        public function priority(): BelongsTo{
            return $this->belongsTo(Priority::class);
        }
        public function status(): BelongsTo{
            return $this->belongsTo(Status::class);
        }
        
}