@extends('layout')
@section('style')
    {{Html::style('assets/global/plugins/select2/css/select2.min.css')}}
    {{Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}
    {{Html::style('assets/global/plugins/icheck/skins/all.css')}}
@endsection
@section('pagecontent')
    <div class="row">
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-dark">Add merchant</span>
                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['action' => 'MerchantController@doAdd', 'method' => 'POST', 'id'=> 'add-merchant-form']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="txt-name"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Logo</label>
                            <input type="text" class="form-control" name="txt-logo"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Website</label>
                            <input type="text" class="form-control" name="txt-website"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn blue uppercase">Add</button>
                        <button type="button" class="btn red-soft uppercase" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    {{Html::script('assets/global/plugins/icheck/icheck.min.js')}}
    {{Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}
    {{Html::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}
    {{Html::script('assets/global/plugins/select2/js/select2.full.min.js')}}
@endsection