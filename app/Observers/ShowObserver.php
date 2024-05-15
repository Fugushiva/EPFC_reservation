<?php

namespace App\Observers;

use App\Models\Show;

class ShowObserver
{
    public function creating(Show $show)
    {
        $show->slug = $this->generateSlug($show->title);
    }

    public function updating(Show $show)
    {
        $show->slug = $this->generateSlug($show->title);
    }

    private function generateSlug($title)
    {
        return toSlug($title); // Utilisez votre fonction de génération de slug ici
    }
}
