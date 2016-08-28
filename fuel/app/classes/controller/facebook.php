<?php
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

		$this->template->content = $view;
	}
}
