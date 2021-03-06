<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		Gate::define('admin', function (User $user) {
			if($user->email == 'admin@test.com') {
				return Response::allow();
			}
			return Response::deny();
		});

		Gate::define('delete_comment', function (User $user, Comment $comment) {
			if($user->id == $comment->user_id || $user->email == 'admin@test.com') {
				return Response::allow();
			}
			return Response::deny();
		});
	}
}
