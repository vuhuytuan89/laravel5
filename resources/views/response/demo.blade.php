đây là trang demo
<div>
    @if(Session::has('messeage'))
        {{ Session::get('messeage') }}
    @endif
</div>