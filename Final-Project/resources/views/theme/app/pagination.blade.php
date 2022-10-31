@if ($paginator->hasPages())
<div class="d-flex justify-content-between mt-5">
    @if ($paginator->onFirstPage())
    @else
        <a href="javascript:;" halaman="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-secondary paginasi">&larr; Sebelumnya</a>
    @endif
    @if ($paginator->hasMorePages())
        <a href="javascript:;" halaman="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-dark paginasi">Selanjutnya &rarr;</a>
    @endif
</div>
@endif