<?php

namespace App\Observers;

use App\Project;

/**
 * Class ProjectObserver.
 */
class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param \App\Project $project
     */
    public function created(Project $project)
    {
        $project->recordActivity('created');
    }

    /**
     * Handle the project "updated" event.
     *
     * @param \App\Project $project
     */
    public function updated(Project $project)
    {
        $project->recordActivity('updated');
    }
}
