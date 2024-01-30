<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/* frontend routes */
Route::prefix('sslcommerzpaymentgateway')->group(function() {
    Route::post("landlord-price-plan-sslcommerz",[\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayController::class,"landlordPricePlanIpn"])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name("sslcommerzpaymentgateway.landlord.price.plan.ipn");

});


/* tenant payment ipn route*/
Route::middleware([
    'web',
    \App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class
])->prefix('sslcommerzpaymentgateway')->group(function () {
    Route::post("tenant-price-plan-sslcommerz",[\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayController::class,"TenantSiteswayIpn"])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
        ->name("sslcommerzpaymentgateway.tenant.price.plan.ipn");

});

/* admin panel routes landlord */
Route::group(['middleware' => ['auth:admin','adminglobalVariable', 'set_lang'],'prefix' => 'admin-home'],function () {
    Route::prefix('sslcommerzpaymentgateway')->group(function() {
        Route::get('/settings', [\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayAdminPanelController::class,"settings"])
            ->name("sslcommerzpaymentgateway.landlord.admin.settings");
        Route::post('/settings', [\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayAdminPanelController::class,"settingsUpdate"]);
    });
});


Route::group(['middleware' => [
    \App\Http\Middleware\Tenant\InitializeTenancyByDomainCustomisedMiddleware::class,
    PreventAccessFromCentralDomains::class,
    'auth:admin',
    'tenant_admin_glvar',
    'package_expire',
    'tenantAdminPanelMailVerify',
    'tenant_status',
    'set_lang'
    ],'prefix' => 'admin-home'],function () {
    Route::prefix('sslcommerzpaymentgateway/tenant')->group(function() {
        Route::get('/settings', [\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayAdminPanelController::class,"settings"])
            ->name("sslcommerzpaymentgateway.tenant.admin.settings");
        Route::post('/settings', [\Modules\SSLCommerzPaymentGateway\Http\Controllers\SSLCommerzPaymentGatewayAdminPanelController::class,"settingsUpdate"]);
    });
});

