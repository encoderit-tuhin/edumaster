<?php

declare(strict_types=1);

namespace App\Interfaces;

interface SluggablePageInterface
{
    public function showBySlug(string $slug);
}