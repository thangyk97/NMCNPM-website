<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportReceipt extends Model
{
    protected $table = "receipt_manager_supplier";

    public $timestamps = false;
}