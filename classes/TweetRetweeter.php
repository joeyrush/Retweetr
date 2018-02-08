<?php
namespace Retweetr;

class TweetRetweeter
{
	public static $api;

	/**
	 * Retweet a tweet by ID
	 * @param  \TwitterAPIExchange $api
	 * @param  int $id
	 * @return Array
	 */
	public static function execute(\TwitterAPIExchange $api, $id)
	{
		static::$api = $api;

		$request = [
			'id' => $id
		];

		$response = $api->buildOauth("https://api.twitter.com/1.1/statuses/retweet/$id.json", 'POST')
			->setPostfields($request)
		    ->performRequest();

		return json_decode($response, true);
	}

	public static function redo($id)
	{
		$request = [
			'id' => $id
		];

		$response = static::$api->buildOauth("https://api.twitter.com/1.1/statuses/unretweet/$id.json", 'POST')
			->setPostfields($request)
		    ->performRequest();

		return static::execute(static::$api, $id);
	}
}