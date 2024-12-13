<?php

namespace App\Enums;

enum ArticleStatus : int
{
    case DRAFT = 0;

    case PUBLISHED = 1;

    case ARCHIVED = 2;

    case PENDING = 3;

    case REJECTED = 4;

    case Invalid = 5;
}
