<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
<style type="text/css">
    .pagination li.active{
        background-color:#c62828;
    }
</style>
@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}"><i class="mdi mdi-chevron-double-left"></i></a>
        </li>
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a {{ ($paginator->currentPage() == 1) ? '' : ' href=' }}"{{ $paginator->url($paginator->currentPage()-1) }}"><i class="mdi mdi-chevron-left"></i></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a {{ ($paginator->currentPage() == $paginator->lastPage()) ? '' : ' href=' }}"{{ $paginator->url($paginator->currentPage()+1) }}" ><i class="mdi mdi-chevron-right"></i></a>
        </li>
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}"><i class="mdi mdi-chevron-double-right"></i></a>
        </li>
    </ul>
@endif