<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_navigation_items';

    protected $fillable = [
        'menu_label',
        'link',
        'menu_order',
        'navigation_id',
        'parent_id'
    ];
}
