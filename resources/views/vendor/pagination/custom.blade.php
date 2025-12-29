@if ($paginator->hasPages())
<div class="pagination">
    @if ($paginator->onFirstPage())
    <a href="#" class="page-item prev disabled">‹</a>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="page-item prev">‹</a>
    @endif
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
    <a href="{{ $url }}" class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">{{ $page }}</a>
    @endforeach
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="page-item next">›</a>
    @else
    <a href="#" class="page-item next disabled">›</a>
    @endif
</div>
@endif
