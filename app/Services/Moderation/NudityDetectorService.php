<?php

namespace App\Services\Moderation;

class NudityDetectorService
{
    public function analyze(string $imagePath): float
    {
        // Mock implementation — return a random value between 0 and 1
        return round(mt_rand(0, 100) / 100, 2);
    }
}
