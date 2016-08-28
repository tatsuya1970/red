<?php
class Controller_Facebook extends Controller
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

		return Response::forge($view);
	}
}
