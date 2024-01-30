<?php

namespace Modules\SSLCommerzPaymentGateway\Http\Controllers;

use App\Helpers\ModuleMetaData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SSLCommerzPaymentGatewayAdminPanelController extends Controller
{
    public function settings()
    {
        $all_module_meta_data = (new ModuleMetaData("SSLCommerzPaymentGateway"))->getExternalPaymentGateway();
        $sslcommerz = array_filter($all_module_meta_data,function ( $item ){
            if ($item->name === "SSLCommerz"){
                return $item;
            }
        });
        $sslcommerz = current($sslcommerz);
        return  view("sslcommerzpaymentgateway::admin.settings",compact("sslcommerz"));
    }

    public function settingsUpdate(Request $request){
        $request->validate([
            "sslcommerz_store_id" => "required|string",
            "sslcommerz_signature_key" => "required|string",
        ]);

        update_static_option("sslcommerz_store_id",$request->aamar_pay_store_id);
        update_static_option("sslcommerz_signature_key",$request->aamar_pay_signature_key);

        if(is_null(tenant())){
            $jsonModifier = json_decode(file_get_contents("core/Modules/SSLCommerzPaymentGateway/module.json"));
            $jsonModifier->nazmartMetaData->paymentGateway->status = $request?->aamarpay_status === 'on';
            $jsonModifier->nazmartMetaData->paymentGateway->test_mode = $request?->aamarpay_test_mode_status === 'on';
            $jsonModifier->nazmartMetaData->paymentGateway->admin_settings->show_admin_landlord = $request?->aamarpay_landlord_status === 'on';
            $jsonModifier->nazmartMetaData->paymentGateway->admin_settings->show_admin_tenant = $request?->aamarpay_tenant_status === 'on';

            file_put_contents("core/Modules/SSLCommerzPaymentGateway/module.json",json_encode($jsonModifier));
        }



        return back()->with(["msg" => __("Settings Update"),"type" => "success"]);
    }
}
