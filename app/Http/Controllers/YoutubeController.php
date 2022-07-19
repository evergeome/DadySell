<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function youtube()
    {
        $views = Youtube::first();
        event(new VideoViewer($views));
        $views = $views->price;
        return view('youtube', compact('views'));
    }
}
