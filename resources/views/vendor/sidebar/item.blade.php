<li class="@if($active)active @endif">
    <a href="{{ $item->getUrl() }}" @if(count($items) > 0) class="menu-toggle"@endif>
        <i class="{{ $item->getIcon() }}" style="margin-top: 9px;"></i>
        <span>{{ $item->getName() }}</span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="ml-menu">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
