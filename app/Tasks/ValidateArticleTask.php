<?php

namespace App\Tasks;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Support\Facades\Log;

class ValidateArticleTask
{

    private $badWords;

    private $article;
    /**
     * Create a new class instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;

        $this->badWords = [
            "bitch",
            "hoe",
            "slut",
            "motherfucker",
            "fuck",
            "ass",
            "cunt",
            "dick",
            "pussy",
            "bastard",
            "shit",
            "cock",
            "twat",
            "prick",
            "fag",
            "bimbo"
        ];
    }

    public function handle()
    {
        if (
            !$this->validator($this->article->title)
            ||   !$this->validator($this->article->summary)
            || !$this->validator($this->article->body)
        ) {

            $this->article->status = ArticleStatus::REJECTED;

            $this->article->save();

            return false;
        }

        return true;
    }

    public function validator(string $text): bool
    {
        $strArray = explode(" ", $text);

        foreach ($strArray as $word) {
            if (in_array($word, $this->badWords)) {
                return false;
            }
        }

        return true;
    }
}
