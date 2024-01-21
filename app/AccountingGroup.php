<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingGroup extends Model
{
    protected $fillable = ['accounting_category_id', 'name', 'code'];

    public function accountingCategory()
    {
        return $this->belongsTo(AccountingCategory::class);
    }
}
