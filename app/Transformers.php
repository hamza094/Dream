<?php

use App\Activity;
use League\Fractal\TransformerAbstract;

class Transformers extends TransformerAbstract
{
    public function transform(Activity $activity)
    {
        return [
            'description' => call_user_func_array([$this, $activity->name], [$activity]),
            'lapse' => $activity->created_at->diffForHumans(),
            'user' => $activity->user,
        ];
    }

    protected function created_task(Activity $activity)
    {
        return $activity->user->name.' created a task, '.$activity->subject->name;
    }
}
