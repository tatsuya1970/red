<?php
class Controller_Yoshioka extends Controller_Base
{
	public $me = null;

	public function before()
	{
		parent::before();

		// 初回アクセス時
		if ( ! Session::get('me')) {
			// TODO:自分の情報をセッションに登録
			$users = DB::select('*')
				->from('users')
				->where('id', 1)
				->limit(1)
				->execute()
				->as_array();
			$me = $users[0];
			Session::set('me', $me);
		}
		$this->me = Session::get('me');
	}

	public function action_index()
	{
		$view = View::forge('yoshioka/index');

		$this->template->content = $view;
	}

	public function action_search()
	{
		$view = View::forge('yoshioka/search');

		$users = DB::select('*')
			->from('users')
			->where('id', '<>', $this->me['id'])
			->and_where_open()
				->or_where('user_name', '=', $this->me['user_name'])
				->or_where('user_age', '=', $this->me['user_age'])
			->and_where_close()
			->execute()
			->as_array();

		//Debug::dump(DB::last_query());

		$view->set('users', $users);

		$this->template->content = $view;
	}

	public function action_logout()
	{
		Session::destroy();

		return Response::redirect('/');
	}
}
