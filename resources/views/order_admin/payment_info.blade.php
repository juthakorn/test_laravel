@extends('layouts.admin')
@section('title', 'จัดการสินค้า')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-tags"></i>
            {{ trans('common.Payment Information') }}
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">สินค้า</a></li>
            <li class="active">จัดการสินค้า</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                
                @include("partials.alert-session")
               
                
                <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('common.Payment Information')." #".$payment->id }}</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">      
                 
                            <table class="table table-gray" style=" margin: 20px auto; width: 500px;" >
                                <thead>
                                  <tr>
                                    <td class="center" colspan="2">{{ trans('common.Payment Information') }}</td>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="right" style="width: 35%;"><strong>{{ trans('common.Payment notification') }} :</strong></td>
                                        <td class="left" style="width: 65%;">{{ DateTime($payment->created_at, TRUE) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><strong>{{ trans('common.Bank account') }} :</strong></td>
                                        <td class="left">
                                            <?php $bank = unserialize($payment->bank_info); ?>                                        
                                            <img class="media-object img-thumbnail" src="<?= url("image/" . imgbank($bank['bank_name'])) ?>" title="<?= $bank['bank_name'] ?>" style="border-radius: 32px;width: 40px; float: left" >   
                                            <div style="float: left;margin-left: 10px;text-align: left;"><p style="margin-bottom: 0">{{ $bank['bank_name'] }}</p><p style="margin-bottom: 0">{{ $bank['bank_number'] }}</p></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right"><strong>{{ trans('common.Transfer Date') }} :</strong></td>
                                        <td class="left" >{{ DateTime($payment->transfer_date)." ".$payment->transfer_time.":00" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><strong>{{ trans('common.Amount') }} :</strong></td>
                                        <td class="left" >{{ number_format($payment->transfer_pay,2)." ".trans('cart.baht')  }}</td>
                                    </tr>
                                    <tr>
                                        <td class="right"><strong>{{ trans('common.Status') }} :</strong></td>
                                        <td class="left" ><?php $status = statuspay($payment->status); ?>                            
                                            <span class="label label-{{ @$status['class'] }}" >{{ $status['text'] }}</span>
                                        </td>
                                    </tr>                        
                                    <tr>
                                        <td class="right"><strong>{{ trans('common.Transfer proof') }} :</strong></td>
                                        <td class="left" >
                                            <?php if(!empty($payment['transfer_file'])){ ?>
                                            <img class="media-object img-thumbnail" src="<?= url("uploads/image_payment/" . $payment['transfer_file']) ?>" style="max-width: 308px"  >   
                                            <?php }else{ echo "-";}?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-bottom: 1px solid #ddd;"><strong>{{ trans('common.More detail') }} :</strong></td>
                                        <td class="left" style="border-bottom: 1px solid #ddd;" >{{ !empty($payment->transfer_note) ? $payment->transfer_note : "-" }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div style=" margin-top: 20px;">
                            <div class="title m-b-2 font16" style="border-bottom:none">{{ trans('cart.Order') }}</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-gray">
                                    <thead>
                                        <tr>                                    
                                            <td class="center" >{{ trans('cart.Order number') }}</td>
                                            <td class="center" >{{ trans('cart.Product') }}</td>
                                            <td class="center" >{{ trans('cart.Order date') }}</td>                                    
                                            <td class="text-center">{{ trans('cart.Order status') }}</td>
                                            <td class="center" style=" width: 110px" >{{ trans('cart.Price') }} (฿)</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                            foreach ($order as $key => $value) {
                                                $status = status($value->status);
                                                $total += $value->final_sum;
                                            ?>
                                        <tr class="vertical-middle">
                                            <td class="center"><a href="{{ url(admin_order_detail($value->order_id)) }}"><span class="badge">{{ $value->order_id }}</span></a></td>
                                            <td>
                                            <?php
                                            $temp = $value->order_detail->groupBy('product_id');                                    
                                            foreach ($temp as $keytmp => $valuetmp) {                                       
                                                                                       
                                                $product = App\Model\Product::find($keytmp);  ?>
                                                <?php if($product != null) {?>
                                                    <a href="{{ url(UrlProduct($valuetmp[0]->product_id, $product->slug_url)) }}" style="text-decoration: none;" title="{{ $valuetmp[0]->p_name }}">
                                                <?php                                           

                                                    if(file_exists(str_replace(url("/")."/", "", ImgProduct($valuetmp[0]->image_store->id, $valuetmp[0]->image_store->new_name150)))){ ?>                                           
                                                    <img src="<?= ImgProduct($valuetmp[0]->image_store->id, $valuetmp[0]->image_store->new_name150)?>" style="height:50px">
                                                    <?php }else{ ?>
                                                        <img src="<?= ImgNoProduct()?>"  style="height:50px">
                                                    <?php } ?>
                                                </a>
                                                <?php }else{ ?>
                                               
                                                    <?php 
                                                    if(file_exists(str_replace(url("/")."/", "", ImgProduct($valuetmp[0]->image_store->id, $valuetmp[0]->image_store->new_name150)))){ ?>                                           
                                                    <img src="<?= ImgProduct($valuetmp[0]->image_store->id, $valuetmp[0]->image_store->new_name150)?>" style="height:50px" title="{{ $valuetmp[0]->p_name }}">
                                                    <?php }else{ ?>
                                                        <img src="<?= ImgNoProduct()?>"  style="height:50px" title="{{ $valuetmp[0]->p_name }}">
                                                    <?php } ?>                                        
                                                <?php } 
                                            }
                                            ?>

                                            </td>
                                            <td>{{ DateTime($value->created_at, TRUE) }}</td>
                                            <td class="text-center">
                                                <span class="label label-{{ @$status['class'] }}" style="{{ @$status['style'] }}">{{ $status['text'] }}</span>
                                            </td>
                                            <td class="text-right">{{ number_format($value->final_sum,2) }}</td>

                                        </tr>  
                                        <?php }?>
                                        <tr>
                                            <td colspan="4" class="text-right" >{{ trans('cart.Total') }}</td>
                                            <td class="text-right">{{ number_format($total,2) }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        
                        </div>  
                       
                    </div>
                    <!-- /.box-body -->
                    
                  </div>
                
            </div>
            <?php if($payment->status == 0){ ?>
            {!! Form::open([
                'route' => 'OrderAdmin.payment_action',
                'method' => 'POST',                
            ]) !!}
            <div class="col-md-12">
                <div class="box-footer">   
                    <div class="pull-right">
                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                        <input type="hidden" name="action" id="action">
                        <button type="submit" class="btn btn-success" onclick="$('#action').val(1)" >อนุมัติ</button>
                        <button type="submit" class="btn btn-danger" onclick="$('#action').val(2)">ไม่อนุมัติ</button>
                    </div>
                </div>                
            </div>
            {!! Form::close() !!}
            <?php } ?>
        </div>


    </section>    
</div><!-- /.content -->

@endsection