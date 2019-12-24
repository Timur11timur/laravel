<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;

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
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }
}
