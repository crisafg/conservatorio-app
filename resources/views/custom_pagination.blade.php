<style>
    .disabled {
    color: rgb(107 114 128 / var(--tw-text-opacity));
    cursor: not-allowed;
}
</style>

<nav id="flechas" class="flex justify-around w-96 mt-4 text-white">
    <a href="{{ $paginator->previousPageUrl() }}" id="prev-page" class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
        <span class="material-symbols-outlined">
            arrow_back
        </span>
    </a>
    <a href="{{ $paginator->nextPageUrl() }}" id="next-page" class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
        <span class="material-symbols-outlined">
            arrow_forward
        </span>
    </a>
</nav>
