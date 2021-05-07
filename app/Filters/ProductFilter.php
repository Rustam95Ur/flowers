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
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhereHas('winery', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('wine_class', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('sort', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('color', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('sugar', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('region', function($q) use ($keyword) {
                        $q->where('title', 'like', '%' . $keyword . '%');
                    })
                ;
            });
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function wine_class($id)
    {
        return $this->builder->whereIn('class_id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function color($id)
    {
        return $this->builder->whereIn('color_id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function sugar($id)
    {
        return $this->builder->whereIn('sugar_id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function region($id)
    {
        return $this->builder->whereIn('region_id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function winery($id)
    {
        return $this->builder->whereIn('winery_id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function sort($id)
    {
        return $this->builder->whereIn('grape_sort_id', $id);

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
    public function year($value)
    {
        return $this->builder->whereIn('year', $value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function fortress($value)
    {
        return $this->builder->whereIn('fortress', $value);
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
