<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Service\TweetService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request-> route('tweetId');
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }
//        $tweetId = (int) $request->route('tweetId');
//        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
//        $tweet->delete();
        $tweetService->deleteTweet($tweetId);
        return redirect()
            ->route('tweet.index')
            ->with('feedback.success', "つぶやきを削除しました。");
    }
}
