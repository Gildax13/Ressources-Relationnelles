<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ressources extends Model
{
    use HasFactory;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'type_id',
        'title',
        'content',
        'slug',
        'file',
        'icon',
    ];

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}
public function type(): BelongsTo
{
    return $this->belongsTo(Type::class);
}
}