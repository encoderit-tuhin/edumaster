<?php

namespace App\Http\Controllers;

use App\AccessControl;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class PermissionController extends Controller
{
	public function index($role_id = ""): Factory|View
	{
		$permission_list = array();

		if ($role_id != "") {
			$permission_list = AccessControl::where("role_id", $role_id)->pluck('permission')->toArray();
		}

		$notAllowed = array(
			'App\Http\Controllers\Auth\LoginController',
			'App\Http\Controllers\Auth\RegisterController',
			'App\Http\Controllers\Auth\ForgotPasswordController',
			'App\Http\Controllers\Auth\ResetPasswordController',
			'App\Http\Controllers\DashboardController',
			'App\Http\Controllers\ProfileController',
			'App\Http\Controllers\MessageController',
			'App\Http\Controllers\Install\InstallController',
		);

		$ignoreRoute = array(
			'events.show',
			'notices.show',
		);

		$app = app();
		$routeCollection = $app->routes->getRoutes();
		$routes = [];

		foreach ($routeCollection as $route) {
			$action = $route->getAction();
			if (array_key_exists('controller', $action)) {
				$explodedAction = explode('@', $action['controller']);

				if (count($explodedAction) !== 2) {
					// Ensure that $explodedAction has 2 elements (Controller and Method)	
					continue;
				}

				if (in_array($explodedAction[0], $notAllowed)) {
					continue;
				}

				if (!isset($routes[$explodedAction[0]])) {
					$routes[$explodedAction[0]] = [];
				}

				$test = app()->make($explodedAction[0]);  // Create an instance of the controller
				if (method_exists($test, $explodedAction[1])) {
					$routes[$explodedAction[0]][] = array("method" => $explodedAction[1], "action" => $route->action);
				}
			}
		}

		$permission = array();

		foreach ($routes as $key => $route) {
			foreach ($route as $r) {
				if (strpos($r['method'], 'get') === 0) {
					continue;
				}

				if (array_key_exists('as', $r['action'])) {
					$routeName = $r['action']['as'];
					if (in_array($routeName, $ignoreRoute)) {
						continue;
					}
					$permission[$key][$routeName] = $r['method'];
				}
			}
		}

		foreach ($permission as $key => $val) {
			foreach ($val as $name => $url) {
				if ($url == "store" && in_array("create", $val)) {
					unset($permission[$key][$name]);
				}
				if ($url == "update" && in_array("edit", $val)) {
					unset($permission[$key][$name]);
				}
			}
		}

		return view('backend.administration.permission.create', compact('permission', 'permission_list', 'role_id'));
	}

	public function store(Request $request): RedirectResponse|Redirector
	{
		$this->validate($request, [
			'role_id' => 'required',
			'permissions' => 'required'
		]);

		$permission = AccessControl::where("role_id", $request->role_id);
		$permission->delete();

		foreach ($request->permissions as $role) {
			$permission = new AccessControl();
			$permission->role_id = $request->role_id;
			$permission->permission = $role;
			$permission->save();
		}

		return redirect('permission/control')->with('success', _lang('Saved Successfully'));
	}
}
