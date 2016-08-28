<?php
class Controller_Yoshioka extends Controller_Base
{
	public $me = null;

	public function before()
	{
		parent::before();

		// 初回アクセス時
		if ( ! Session::get('me')) {
			$data = array(
				'user_name' => '',
				'user_age' => '',
				'created_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
				'updated_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
			);
			list($insert_id, $rows_affected) = DB::insert('users')->set($data)->execute();

			$this->set_session($insert_id);
		}
		$this->me = Session::get('me');
	}

	public function action_index()
	{
		$view = View::forge('yoshioka/index');

		$view->set('me', $this->me);

		$this->template->content = $view;
	}

	public function action_search()
	{
		$view = View::forge('yoshioka/search');

		$users = DB::select('*')
			->from('users')
			->where('user_name', '<>', '')
			->where('id', '<>', $this->me['id'])
			->and_where_open()
				->or_where('user_age', '=', $this->me['user_age'])
			->and_where_close()
			->execute()
			->as_array();

		//Debug::dump(DB::last_query());

		$view->set('users', $users);

		$view->set('me', $this->me);

		$this->template->content = $view;
	}

	public function action_profile()
	{
		$view = View::forge('yoshioka/profile');

		$success = Session::get_flash('success');
		$view->set('success', $success);

		$view->set('me', $this->me);

		$this->template->content = $view;
	}

	public function action_profile_edit()
	{
		$data = array(
			'user_name' => Input::post('user_name'),
			'user_age' => Input::post('user_age'),
		);
		DB::update('users')->set($data)->where('id', $this->me['id'])->execute();

		Session::set_flash('success', '編集しました');

		$this->set_session($this->me['id']);

		return Response::redirect('profile');
	}

	public function action_logout()
	{
		$this->clear_session();

		return Response::redirect('/');
	}

	public function set_session($id)
	{
		$users = DB::select('*')
			->from('users')
			->where('id', $id)
			->execute()
			->as_array();
		if (count($users)) {
			Session::set('me', $users[0]);
		}
	}

	public function clear_session()
	{
		Session::delete('me');
	}
}
