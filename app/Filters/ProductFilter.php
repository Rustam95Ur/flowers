<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    /**
     * @param $keyword
     * @return mixed
     */
    public function title($keyword = null)
    {
        if ($keyword) {
            return $this->builder->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            });
        }
    }

    /**
     * @param $value
     * @return mixed
     */
    public function color_id($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('colors', function($q) use ($value) {
                $q->whereIn('color_id', $value);
            })
            ;
        });
    }

    /**
     * @param $value
     * @return mixed
     */
    public function size_id($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('sizes', function($q) use ($value) {
                $q->whereIn('size_id', $value);
            })
            ;
        });
    }


    /**
     * @param $prices
     * @return mixed
     */
    public function price($prices)
    {
        $ranges = [];
        foreach ($prices as $price) {
            $min_max = explode('-', $price);
            $min_val = ['price', '>=', (int)$min_max[0]];
            $max_val = ['price', '<', (int)$min_max[1]];
            array_push($ranges, [$min_val, $max_val]);

        }
        return $this->builder->where(function ($query) use ($ranges) {
            foreach ($ranges as $value) {
                $query->orWhere($value);
            }
        });

    }


    /**
     * @param $value
     * @return mixed
     */
    public function category_id($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('categories', function($q) use ($value) {
                    $q->whereIn('category_id', $value);
                })
            ;
        });
    }

    /**
     * @param $order
     * @return mixed
     */
    public function price_sort($order)
    {
        if ($order) {
            return $this->builder->orderBy('price', $order);
        }
        else {
            return $this->builder->orderByRaw('-sort_id DESC');
        }
    }

}
