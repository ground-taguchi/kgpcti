@extends('adminlte::page')

@section('title', 'KYOTOCTI')

@section('content_header')
<div class="pb-10">
</div>

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-header">
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
            <table class="table table-bordered table-striped mt-5">
                <thead>
                    <tr>
                        <th class="text-center">ユーザーID</th>
                        <th class="text-center">名前</th>
                        <th class="text-center">TEL</th>
                        <th class="text-center">メールアドレス</th>
                        <th class="text-center">コメント</th>
                        <th class="text-center">登録・更新日時</th>
                        <th class="text-center" style="width: 40px"></th>
                        <th class="text-center" style="width: 40px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userInfos as $userInfo)
                    <tr>
                        <td class="align-middle text-center">{{ $userInfo->user_id }}</td>
                        <td class="align-middle text-center">{{ $userInfo->name }}</td>
                        <td class="align-middle text-center">{{ $userInfo->tel }}</td>
                        <td class="align-middle text-center">{{ $userInfo->mail_address }}</td>
                        <td class="align-middle text-center"><x-adminlte-textarea name="comment" rows="2" cols="32" style="width: 100%;">{{ $userInfo->comment }}</x-adminlte-textarea></td>
                        <td class="align-middle text-center">{{ $userInfo->regist_date }}</td>
                        <td class="align-middle text-center">
                            <a class="btn btn-primary btn-sm mb-10s" href="{{ url('/')}}?tel={{ $userInfo->tel }}"
                                role="button">編集</a>
                        </td>
                        <td class="align-middle text-center">
                            <form action="{{ route('posts.destroy', ['id' => $userInfo->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                {{-- 簡易的に確認メッセージを表示 --}}
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('削除してもよろしいですか?');">
                                    削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($userInfos->hasPages())
        <div class="card-footer clearfix">
            {{ $userInfos->links() }}
        </div>
        @endif
    </div>
@stop
