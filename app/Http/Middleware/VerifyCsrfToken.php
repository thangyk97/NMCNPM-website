<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'changeStatus',

        'saveJsonProducts',
        'updateJsonProducts',

        'saveJsonEmployees',
        'updateJsonEmployees',

        'saveJsonManager',
        'updateJsonManager',

        'saveJsonExportReceipt',
        'updateJsonExportReceipt',

        'saveJsonImportReceipt',
        'updateJsonImportReceipt',

        'saveJsonSupplier',
        

        'loginApp',
        
    ];
}
