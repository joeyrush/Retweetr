<?php
namespace Retweetr;

class TweetRetweeter
{
	/**
	 * Retweet a tweet by ID
	 * @param  \TwitterAPIExchange $api
	 * @param  int $id
	 * @return Array
	 */
	public static function execute(\TwitterAPIExchange $api, $id)
	{
		$request = [
			'id' => $id
		];

		$response = $api->buildOauth("https://api.twitter.com/1.1/statuses/retweet/$id.json", 'POST')
			->setPostfields($request)
		    ->performRequest();

		return json_decode($response, true);
	}
}