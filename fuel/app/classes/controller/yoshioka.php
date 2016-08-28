<?php
class Controller_Yoshioka extends Controller_Base
{
	/**
	 * データベース接続テスト
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$view = View::forge('yoshioka/index');

		$users = Model_Users::find('all');

		$view->set('users', $users);

		$this->template->content = $view;
	}
}
