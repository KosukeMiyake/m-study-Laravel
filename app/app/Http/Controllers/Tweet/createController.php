<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
use App\Service\TweetService;

class createController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request, TweetService $tweetService)
    {
        $tweetService->saveTweet(
            $request->userId(),
            $request->tweet(),
            $request->images()
        );
        //
//        $tweet = new Tweet();
//        $tweet->content = $request->tweet();
//        $tweet->user_id = $request->userId();
//        $tweet->save();
        return redirect()->route('tweet.index');
    }

}
