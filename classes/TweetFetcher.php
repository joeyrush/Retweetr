<?php 
namespace Retweetr;

/**
 * List out a users tweets
 */
class TweetFetcher
{
	/**
	 * Twitter handle
	 * @var string
	 */
	protected $username;

	/**
	 * Twitter API instance
	 * @var TwitterAPIExchange
	 */
	protected $api;
	
	function __construct(\TwitterAPIExchange $api, $username = null)
	{
		$this->api = $api;
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function get($count = 50)
	{
		if (empty($this->username)) {
			return array();
		}
		
		$response = $this->api->setGetfield("?screen_name={$this->username}&include_rts=false&count=$count")
			->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
		    ->performRequest();

		$response = json_decode($response, true);

		return array_filter($response, function($tweet) {
			if (empty($tweet['retweeted_status'])) {
				return $tweet;
			}
		});
	}
}