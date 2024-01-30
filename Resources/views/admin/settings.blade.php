@extends(route_prefix()."admin.admin-master")
@section('title') {{__('SSL Commerz  Settings')}}@endsection
@section("content")
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
{{--                <h4 class="card-title mb-4">{{__('Aamar Pay Settings')}}</h4>--}}
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route('aamarpaypaymentgateway.'.route_prefix().'admin.settings')}}">
                    @csrf
                    <x-fields.input type="text" value="{{get_static_option('sslcommerz_store_id')}}" name="sslcommerz_store_id" label="{{__('Store ID')}}"/>
                    <x-fields.input type="text" value="{{get_static_option('sslcommerz_signature_key')}}" name="sslcommerz_signature_key" label="{{__('Signature Key')}}"/>


{{--                    <x-fields.switcher label="{{__('Kineticpay Test Mode Enable/Disable')}}" name="kineticpay_test_mode_status" value="{{$kineticpay->test_mode}}"/>--}}

                    <x-fields.switcher label="{{__('Enable/Disable')}}" name="sslcommerz_status" value="{{$sslcommerz->status}}"/>
                    @if(is_null(tenant()))
                    <x-fields.switcher label="{{__('Enable/Disable Landlord Websites')}}" name="sslcommerz_landlord_status" value="{{$sslcommerz->admin_settings->show_admin_landlord}}"/>
                    <x-fields.switcher label="{{__('Enable/Disable Tenant Websites')}}" name="sslcommerz_tenant_status" value="{{$sslcommerz->admin_settings->show_admin_tenant}}"/>
                    @endif
                    <button type="submit" class="btn btn-gradient-primary mt-5 me-2">{{__('Save Changes')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
