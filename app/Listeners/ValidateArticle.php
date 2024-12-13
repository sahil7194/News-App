<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Tasks\ValidateArticleTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ValidateArticle implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ArticleCreated $event): void
    {
        (new ValidateArticleTask($event->article))->handle();
    }
}
