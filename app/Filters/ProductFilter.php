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
    public function colors($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('colors', function ($q) use ($value) {
                $q->whereIn('color_id', $value);
            });
        });
    }

    /**
     * @param $value
     * @return mixed
     */
    public function sizes($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('sizes', function ($q) use ($value) {
                $q->whereIn('size_id', $value);
            });
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
    public function categories($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('categories', function ($q) use ($value) {
                $q->whereIn('category_id', $value);
            });
        });
    }

    /**
     * @param $value
     * @return mixed
     */
    public function types($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('types', function ($q) use ($value) {
                $q->whereIn('type_id', $value);
            });
        });
    }

    /**
     * @param $value
     * @return mixed
     */
    public function intendeds($value)
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->whereHas('intendeds', function ($q) use ($value) {
                $q->whereIn('intended_id', $value);
            });
        });
    }


    /**
     * @param $value
     * @return mixed
     */
    public function sort($value)
    {
        switch ($value) {
            case 1:
                return $this->builder->orderBy('title', 'ASC');
            case 2:
                return $this->builder->orderBy('id', 'DESC');
            case 3:
                return $this->builder->orderBy('price', 'ASC');
            case 4:
                return $this->builder->orderBy('price', 'DESC');
        }

    }

}
