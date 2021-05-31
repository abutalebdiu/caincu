<?php

namespace App\Model\Order;
use App\Model\Order\SaleInvoiceDetails;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    public function saleDetail()
    {
        return $this->hasMany(SaleInvoiceDetails::class,'sale_invoice_id','id')->whereNull('deleted_at');
    }
}
