<?php

namespace App\Services\Moderation;

use App\Models\Artwork;

class ModerationService
{
    protected NudityDetectorService $nudity;
    protected AIGenerationDetectorService $aiDetector;

    public function __construct(NudityDetectorService $nudity, AIGenerationDetectorService $aiDetector)
    {
        $this->nudity = $nudity;
        $this->aiDetector = $aiDetector;
    }

    public function analyze(Artwork $art): void
    {
        $imagePath = storage_path('app/public/' . $art->image);

        $nsfw = $this->nudity->analyze($imagePath);
        $ai = $this->aiDetector->analyze($imagePath);

        $status = 'approved';
        if ($nsfw > 0.7) {
            $status = 'flagged';
        }

        $auth = 'Human Made';
        if ($ai > 0.8) {
            $auth = 'Suspected AI Generated';
        } elseif ($ai > 0.5) {
            $auth = 'AI Assisted';
        }

        $art->update([
            'nsfw_score' => $nsfw,
            'ai_generated_score' => $ai,
            'moderation_status' => $status,
            'authenticity_label' => $auth,
        ]);
    }
}
