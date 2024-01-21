<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkDistribution extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mark_distributions';
    protected $fillable = ['mark_distribution_type', 'mark_percentage', 'is_exam', 'is_active'];
}
