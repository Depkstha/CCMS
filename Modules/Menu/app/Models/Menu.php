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
        'image',
        'icon',
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

    protected function urlParameter(): Attribute
    {
        return Attribute::make(
            get: function (?string $value, ?array $attributes) {
                $parameter = null;

                switch ($attributes['type']) {
                    case 'single-link':
                        $parameter = $attributes['parameter'];
                        break;

                    default:
                        $model = config('constants.menu_type_options')[$attributes['type']] ?? null;
                        if ($model) {
                            $modelClass = "Modules\\CCMS\\Models\\$model";
                            $parameter = optional($modelClass::find($attributes['parameter']))->slug;
                        }
                        break;
                }

                return $parameter;
            }
        );
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
                        // return route('loadPage', Page::whereId($this->attributes['parameter'])->value('slug'));
                    case 'fragment':
                        return $this->attributes['parameter'];
                    case 'single-link':
                        return Config::get('app.url') . $this->attributes['parameter'];
                    default:
                        return '#';
                }
            },
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset($value),
        );
    }
}
