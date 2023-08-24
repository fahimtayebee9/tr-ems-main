@php
    $breadcrumbs = session()->get('breadcrumb');
@endphp

<h3 class="page-title">{{ session('page_title') }}</h3>
<ul class="breadcrumb">
    @if(!empty($breadcrumbs))
        @foreach($breadcrumbs as $key => $value)
            @if($key === array_search(end($breadcrumbs), $breadcrumbs))
                <li class="breadcrumb-item active">
                    {{ $key }}
                </li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $value }}"><i class="fa fa-dashboard"></i>
                        {{ $key }}
                    </a>
                </li>
            @endif
        @endforeach
    @endif
</ul>