<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string title
 * @property string template
 * @property int size
 * @property bool active
 * @property int object_item_id
 * @property Responsible responsibles
 * @property ObjectItem objectItem
 */
class ServiceItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'template',
        'size',
        'active',
        'object_item_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean',
        'object_item_id' => 'integer',
    ];

    public function responsibles()
    {
        return $this->belongsToMany(Responsible::class);
    }

    public function objectItem()
    {
        return $this->belongsTo(ObjectItem::class);
    }
}
