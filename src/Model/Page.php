<?php

declare(strict_types=1);

namespace App\Model;

readonly class Page
{
    public function __construct(
        public string $page,
        public string $title,
        public string $description,
    ) {}
}
