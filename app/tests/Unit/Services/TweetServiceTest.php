<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Service\TweetService;
use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_tweet()
    {
        $tweetService = new TweetService();

        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1
        ]);
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

                $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
