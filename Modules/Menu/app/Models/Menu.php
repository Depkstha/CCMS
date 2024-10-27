<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Menu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'menu_location_id',
        'title',
        'alias',
        'target',
        'icon_class',
        'parent_id',
        'order',
        'type',
        'parameter',
        'status',
    ];

    public $appends = ['location'];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function location(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                return config('constants.menu_location_options')[$attributes['menu_location_id']];
            }
        );
    }

    protected function routeName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                switch ($this->attributes['type']) {
                    case 'pages':
                        //
                        break;
                    case 'single-link':
                        return Config::get('app.url') . $this->attributes['parameter'];
                    default:
                        return '#';
                }
            },
        );
    }
}
