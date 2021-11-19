<!-- pagination -->
@if ($paginator->hasPages())
<div class="col-md-12">
    <div class="post-pagination">
        @if ($paginator->onFirstPage())
        <a href="" class="btn disabled  pagination-back pull-left">@lang('web.BACK')</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">@lang('web.BACK')</a>
    @endif


        <ul class="pages">
        @foreach ($elements as $element)

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="active">{{ $page }}</li>

                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
</ul>




        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next pull-right">@lang('web.NEXT')</a>
    @else
    <a href="" class=" btn disabled pagination-next pull-right">@lang('web.NEXT')</a>
    @endif
        

    </div>
</div>
@endif
<!-- pagination -->
