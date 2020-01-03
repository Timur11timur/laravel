<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the models blog post "created" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return void
     */
    public function created(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return void
     */
    public function updated(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post before "updating" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return bool
     */
    public function updating(BlogPost $modelsBlogPost)
    {
//        $test[] = $modelsBlogPost->isDirty();
//        $test[] = $modelsBlogPost->isDirty('is_published');
//        $test[] = $modelsBlogPost->isDirty('user_id');
//        $test[] = $modelsBlogPost->getAttribute('is_published');
//        $test[] = $modelsBlogPost->is_published;
//        $test[] = $modelsBlogPost->getOriginal('is_published');
//        dd($test);

        $this->setPublishedAt($modelsBlogPost);

        $this->setSlug($modelsBlogPost);
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return void
     */
    public function deleted(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return void
     */
    public function restored(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  BlogPost  $modelsBlogPost
     * @return void
     */
    public function forceDeleted(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * @param BlogPost $modelsBlogPost
     */
    private function setPublishedAt(BlogPost $modelsBlogPost)
    {
        if(isset($modelsBlogPost->is_published)) {
            $modelsBlogPost->is_published = 1;
            if(!isset($modelsBlogPost->published_at)) {
                $modelsBlogPost->published_at = Carbon::now();
            }
        } else {
            $modelsBlogPost->is_published = 0;
        }
    }

    /**
     * @param BlogPost $modelsBlogPost
     */
    private function setSlug(BlogPost $modelsBlogPost)
    {
        if(empty($modelsBlogPost->slug)) {
            $modelsBlogPost->slug = Str::slug($modelsBlogPost->title);
        }
    }
}
