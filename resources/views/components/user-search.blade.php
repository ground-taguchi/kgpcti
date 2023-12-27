<form method="get" action="{{ url('/') }}">
    <x-adminlte-input name="telSsearch" placeholder="電話番号" igroup-class="row col-3 mx-auto">
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
