<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        if (!session()->has('offer')) {
            $this->update($event->video);
        } else {
            return false;
        }
    }

    public function update($video)
    {
        $views = $video::first();
        $views->price = $views->price + 1;
        $views->save();
        session()->put('offer', $video->id);
    }
}
