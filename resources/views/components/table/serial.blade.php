@props(['paginator', 'loop'])

{{ ($paginator->currentPage() - 1) * $paginator->perPage() + $loop->index + 1 }}
