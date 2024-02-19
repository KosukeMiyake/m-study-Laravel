<?php
namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Service\TweetService;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets();
        return view('Tweet.index')
            ->with('tweets', $tweets);
    }

}
