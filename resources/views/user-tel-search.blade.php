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
                                <h5> ユーザ情報検索 </h5>
                            </div>
                        </div>
                    </div>
                    <form method="get" action="{{ url('/') }}">
                        <x-adminlte-input name="tel" placeholder="電話番号" igroup-class="row col-3 mx-auto">
                            <x-slot name="appendSlot">
                                <x-adminlte-button type="submit" label="検索"/>
                            </x-slot>
                            <x-slot name="prependSlot">
                                <div class="input-group-text ">
                                    <i class="fas fa-phone fa-flip-horizontal"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </form>
                </div>
                <form class="mt-1 border" method="POST" action="{{ route('posts.update', $userInfo->id) }}">
                    @if (isset($isUpdate))
                        <div class="form-group text-center pt-3">
                            <p class="text-info font-weight-bold">【{{$userInfo->name}}】 ユーザー情報の更新が完了しました</p>
                        </div>
                    @endif
                    @if (isset($isStore))
                    <div class="form-group text-center pt-3">
                        <p class="text-info font-weight-bold">【{{$userInfo->name}}】 ユーザー情報の登録が完了しました</p>
                    </div>
                @endif
                    @csrf
                    @method('PUT')
                        <x-adminlte-input name="user_id" label="ユーザーID"
                            fgroup-class="form-group row pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="{{ isset($userInfo) ? $userInfo->user_id : '' }}" readonly/>
                        <x-adminlte-input name="name" label="名前"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="{{ isset($userInfo) ? $userInfo->name : '' }}"/>
                        <x-adminlte-input name="tel" label="TEL"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="{{ isset($userInfo) ? $userInfo->tel : '' }}" required="required"/>
                        <x-adminlte-input name="mail_address" label="MAIL"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7"
                            value="{{ isset($userInfo) ? $userInfo->mail_address : '' }}"/>
                        <x-adminlte-textarea name="comment" label="コメント"
                            fgroup-class="form-group row border-top pt-3 col-5 mx-auto"
                            label-class="col-3 col-form-label" igroup-class="col-7" rows="8">
                            {{ isset($userInfo) ? $userInfo->comment : '' }}
                        </x-adminlte-textarea>

                        <div class="form-group text-center">
                        <x-adminlte-button label="更新" type="submit" class="btn-lg"/>
                        </div>
                </form>
            </div>
        </div>
@stop
