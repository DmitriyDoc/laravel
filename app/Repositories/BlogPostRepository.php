<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepository
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * получить список статй для вывода в списке
     * (админка)
     *
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
                        ->select($columns)
                        ->orderBy('id','DESC')
                        // другой вариант
                        //->with(['category','user'])
                        ->with([
                            'category' => function ($query) {
                                $query->select(['id', 'title']);
                            },
                            'user:id,name',
                        ])
                        ->paginate(25);

        return $result;
    }
}
