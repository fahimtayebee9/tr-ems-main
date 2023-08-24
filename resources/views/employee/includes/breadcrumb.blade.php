<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">{{ session()->get('page_title') }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach(session()->get('breadcrumb') as $breadcrumb)
                    <li class="breadcrumb-item @if(last(session()->get('breadcrumb')) == $breadcrumb) active @endif">
                        @if(last(session()->get('breadcrumb')) != $breadcrumb)
                            <a href="{{ $breadcrumb['link'] }}">
                        @endif
                            {{ $breadcrumb['name'] }}
                        @if(last(session()->get('breadcrumb')) != $breadcrumb)
                            </a>
                        @endif
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>     