<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;

/**
 * Class BlogPostRepository
 *
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
     * @return mixed
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
            ->orderBy('id', 'DESC')
            //->with(['user', 'category'])
            ->with([
                'user:id,name',
                'category' => function($query) {
                    $query->select(['id', 'title']);
            }])
            ->paginate(25);

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
}
