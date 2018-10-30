@foreach ($collection as $nav)
    <li class="{{ array_search_value($nav->id, $selectedNavigationParents) ? 'active' : ''}}">
        <a {{ $nav->children->count()? "class=has-arrow" : "" }} href="{{ isset($navigation[$nav->id])? '#' : $nav->url }}"
           aria-expanded="false">
            {{-- Change The Icon Algin To Look Cool --}}
            @empty($changeIconAlign)
                <i class="fa fa-fw fa-{{ $nav->icon }}"></i>
            @endempty
            <span>{!! $nav->title !!}</span>
            @isset($changeIconAlign)
                <i class="fa fa-fw fa-{{ $nav->icon }}"></i>
            @endisset
            <i class="fa fa-angle-left pull-right"></i>
        </a>

        @if (isset($navigation[$nav->id]))
            <ul aria-expanded="false" class="collapse">
                @include ('dashboard.partials.navigation_list', ['collection' => $navigation[$nav->id],'changeIconAlign' => true])
            </ul>
        @endif
    </li>
@endforeach


