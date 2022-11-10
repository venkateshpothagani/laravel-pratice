<?php


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Container\Container;

class CustomPaginator
{
    /**
     * Create a new simple paginator instance.
     *
     * @param  \Illuminate\Support\Collection  $items
     * @param  int  $perPage
     * @param  int  $currentPage
     * @param  array  $options
     * @return \Illuminate\Pagination\Paginator
     */
    protected function paginate($items, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items',
            'perPage',
            'currentPage',
            'total',
            'options'
        ));
    }
}
