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
				'user_shusshin' => '',
				'user_gakureki' => '',
				'user_shigoto' => '',
				'created_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
				'updated_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
			);
			list($insert_id, $rows_affected) = DB::insert('users')->set($data)->execute();

			$this->set_session($insert_id);
		}

		$this->me = Session::get('me');

		if (is_array($this->me)) {
			if ($this->me['id']) {
				$data = array(
					'last_access_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
				);
				DB::update('users')->set($data)->where('id', $this->me['id'])->execute();
			}
		}
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

		if ($this->me['user_name'] == '') {
			Session::set_flash('firsttime', 'まずはプロフィールを登録してください');
			return Response::redirect('profile');
		}

		$view->set('me', $this->me);

		$this->template->content = $view;
	}

	public function action_search_api()
	{
		$users = DB::select('*')
			->from('users')
			->where('user_name', '<>', '')
			->where('last_access_at', '>=', strftime('%F %T', strtotime('-1 minute', $_SERVER['REQUEST_TIME'])))
			->where('id', '<>', $this->me['id'])
			->and_where_open()
				->or_where('user_age', '=', $this->me['user_age'])
				->or_where('user_shusshin', '=', $this->me['user_shusshin'])
				->or_where('user_gakureki', '=', $this->me['user_gakureki'])
				->or_where('user_shigoto', '=', $this->me['user_shigoto'])
			->and_where_close()
			->execute()
			->as_array();

		//Debug::dump(DB::last_query());

		header('content-type: application/json; charset=utf-8');

		return Format::forge($users)->to_json();
	}

	public function action_profile()
	{
		$view = View::forge('yoshioka/profile');

		$firsttime = Session::get_flash('firsttime');
		$view->set('firsttime', $firsttime);

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
			'user_shusshin' => Input::post('user_shusshin'),
			'user_gakureki' => Input::post('user_gakureki'),
			'user_shigoto' => Input::post('user_shigoto'),
			'updated_at' => strftime('%F %T', $_SERVER['REQUEST_TIME']),
		);
		DB::update('users')->set($data)->where('id', $this->me['id'])->execute();

		Session::set_flash('success', 'プロフィールを更新しました');

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
