<?php

namespace App\Services\Moderation;

class AIGenerationDetectorService
{
    public function analyze(string $imagePath): float
    {
        // Mock implementation — return a random confidence
        return round(mt_rand(0, 100) / 100, 2);
    }
}
