<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteNavigation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_navigations';

    public function navigation_items()
    {

        return $this->hasMany(NavigationItem::class, 'navigation_id')->where('status',1);
    }
}
