<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
       return Model::class;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getEdit(int $id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection
     */
    public function getForComboBox()
    {
        //return $this->startConditions()->all();

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title'
        ]);

        /*$result = $this->startConditions()->all();
        $result = $this->startConditions()
            ->select('blog_categories.*', \DB::raw('CONCAT (id, ". ", title) AS id_title'))
            ->toBase()
            ->get();*/
        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @param int|null $perPage
     *
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($fields)
             ->paginate($perPage);

        return $result;
    }
}
