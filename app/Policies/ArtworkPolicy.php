<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;

class ArtworkPolicy
{
    public function create(User $user): bool
    {
        return $user->isArtist() || $user->isAdmin();
    }

    public function update(User $user, Artwork $artwork): bool
    {
        return $user->id === $artwork->user_id || $user->isAdmin();
    }

    public function delete(User $user, Artwork $artwork): bool
    {
        return $user->id === $artwork->user_id || $user->isAdmin();
    }
}
