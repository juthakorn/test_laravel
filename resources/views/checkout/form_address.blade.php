<div class="form-horizontal">  
    {!! Form::model($address,[
    'url' => UrlCheckoutSaveAddress(),
    'method' => 'POST',
    'id'=>'form-address'
    ]) !!}  
    {!! Form::hidden('id', null, []) !!} 
    <div class="row">
        <div class="form-group col-sm-12">
            <label  class="col-sm-4 control-label required_field">{{ trans('user.First Name') }}</label>
            <div class="col-sm-6">
                {!! Form::text('firstname', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div> 
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Last Name') }}</label>
            <div class="col-sm-6">      
                {!! Form::text('lastname', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Address') }}</label>
            <div class="col-sm-6"> 
                {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'2', 'required'=>'true']) !!}                                   
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Sub-district') }}</label>
            <div class="col-sm-6">      
                {!! Form::text('sub_district', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.District') }}</label>
            <div class="col-sm-6">      
                {!! Form::text('district', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Province') }}</label>
            <div class="col-sm-6">      
                {!! Form::select('province',$province, null, ['class' => 'form-control', 'required'=>'true']) !!}               
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Postal Code') }}</label>
            <div class="col-sm-6">      
                {!! Form::text('postcode', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label required_field">{{ trans('user.Phone Number') }}</label>
            <div class="col-sm-6">      
                {!! Form::text('tel', null, ['class' => 'form-control', 'required'=>'true']) !!} 
            </div>
        </div>
    </div>


    <div class="row">
        <div class="text-center">
            <button type="submit" class="btn btn-theme">{{ trans('cart.Save and Continue') }}</button>
            <button type="button" class="btn btn-default" onclick="cancel_address()">{{ trans('common.cancel') }}</button>
        </div>
    </div>     
    {!! Form::close() !!}
</div>