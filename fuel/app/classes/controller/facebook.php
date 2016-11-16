<?php


require_once __DIR__ . '/../../vendor/facebook-sdk-3.2.3/facebook.php';

class Controller_Facebook extends Controller_Base
{
	/**
	 * facebook
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$view = View::forge('facebook/index');

		$test = '変数をViewsに渡すテスト';
		$view->set('test', $test);

		$facebook = new Facebook(array(
			'appId' =>   '327078404349882',
			'secret' =>  'f44cba0d25634c125a72b448e022b102',
			'cookie' =>  true,
		));


		$params = array('redirect_uri' => 'http://yoshioka-hackathon.phonogram.tv/facebook/callback');
		$loginUrl = $facebook->getLoginUrl($params);
		$view->set('loginUrl', $loginUrl);

		$this->template->content = $view;
	}


	public function action_callback()
	{
		$view = View::forge('facebook/callback');

		$facebook = new Facebook(array(
				'appId' =>   '327078404349882',
				'secret' =>  'f44cba0d25634c125a72b448e022b102',
				'cookie' =>  true,
				'scope' => 'public_profile, user_friends, read_mailbox, read_page_mailboxes, manage_pages'
		));

		$userId = $facebook->getUser();
		$user = $facebook->api('/me', 'GET');
		// ユーザの情報を取得
		$userStatus = $facebook->api('/me?fields=name,gender,locale,age_range','GET');

		$view->set('user', $user);
		$view->set('userStatus', $userStatus);

		$this->template->content = $view;
	}
}
