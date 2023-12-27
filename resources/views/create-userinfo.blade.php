@extends('adminlte::page')
@section('title', 'KYOTOCTI')
@section('content_header')
<div class="pb-10">
</div>
@stop
@section('content')
        <div class="card">
            <div class="card-body">
                <div class="card-header mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 text-center">
                                <h5> ユーザ情報登録 </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="mt-1 border" method="POST" action="{{ route('user-info.store') }}">
                    @csrf
                        <x-adminlte-input name="user_id" label="ユーザーID"
                            fgroup-class="form-group row pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="" required="required"/>
                        <x-adminlte-input name="name" label="名前"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value=""/>
                        <x-adminlte-input name="tel" label="TEL"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="" required="required"/>
                        <x-adminlte-input name="mail_address" label="MAIL"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value=""/>
                        <x-adminlte-textarea name="comment" label="コメント"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7" rows="8">
                        </x-adminlte-textarea>

                        <div class="form-group text-center">
                        <x-adminlte-button label="登録" type="submit" class="btn-lg"/>
                        </div>
                </form>
            </div>
        </div>
@stop
