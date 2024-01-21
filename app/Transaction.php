<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    public const SALES_TRANSACTION = 'sales';
    public const SALES_RETURN_TRANSACTION = 'sales_return';
    public const PURCHASE_TRANSACTION = 'purchases';
    public const PURCHASE_RETURN_TRANSACTION = 'purchases_return';

    protected $fillable = [
        'trans_date',
        'account_id',
        'trans_type',
        'amount',
        'discount',
        'discount_type',
        'paid_amount',
        'due_amount',
        'payment_status',
        'dr_cr',
        'chart_id',
        'payee_payer_id',
        'payment_method_id',
        'create_user_id',
        'update_user_id',
        'reference',
        'attachment',
        'note',

    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'payee_payer_id');
    }
    public function purchasesItems()
    {
        return $this->hasMany(Purchase::class, 'transaction_id');
    }
    public function salesItems()
    {
        return $this->hasMany(Sales::class, 'transaction_id');
    }
    public function customer()
    {
        return $this->belongsTo(Student::class, 'payee_payer_id');
    }
    public function PurchasesReturn()
    {
        return $this->hasMany(PurchasesReturn::class, 'transaction_id');
    }
    public function salesReturn()
    {
        return $this->hasMany(salesReturn::class, 'transaction_id');
    }
}