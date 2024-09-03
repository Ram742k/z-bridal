<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'customer_name',
        'customer_mobile',
        'cutomer_email',
        'customer_city',
        'sales_person_id',
        'sales_person_name',
        'service_person_id',
        'service_person_name',
        'payment_method',
        'sub_total',
        'tax_percentage',
        'total_tax',
        'total',
        'discount',
        'total_after_discount',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
