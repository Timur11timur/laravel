<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the models blog category "created" event.
     *
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function created(BlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $modelsBlogCategory
     * @return void
     */
    public function creating(BlogCategory $modelsBlogCategory)
    {
        $this->setSlug($modelsBlogCategory);
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function updated(BlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function updating(BlogCategory $modelsBlogCategory)
    {
        $this->setSlug($modelsBlogCategory);
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function deleted(BlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function restored(BlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param  BlogCategory  $modelsBlogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $modelsBlogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $modelsBlogCategory
     */
    private function setSlug(BlogCategory $modelsBlogCategory)
    {
        if(empty($modelsBlogCategory->slug)) {
            $modelsBlogCategory->slug = Str::slug($modelsBlogCategory->title);
        }
    }
}
