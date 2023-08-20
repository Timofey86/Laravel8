<?php

namespace App\Http\Controllers\Admin;


use App\Actions\AdminUserUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserFormRequest;
use App\Models\AdminUser;
use App\Services\AdminUserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = AdminUser::orderBy("created_at", "DESC")->paginate(3);

        return view("admin.admin_users.index", [
            "users" => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Application|View
     */
    public function create(): View|Application|Factory
    {
        return view("admin.admin_users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdminUserFormRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(AdminUserFormRequest $request)
    {
        $data = $request->validated();

        AdminUser::create($data);

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|Application|View
     */
    public function edit($id)
    {
        $user = AdminUser::findOrFail($id);

        return view("admin.admin_users.create", [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdminUserFormRequest  $request
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(AdminUserFormRequest $request, AdminUserUpdateAction $action, AdminUserService $service, $id)
    {
        $user = AdminUser::findOrFail($id);

        $action->handle($user,$request->validated());
       // $service->store($user, $request->validated());

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        AdminUser::destroy($id);

        return redirect(route("admin.admin_users.index"));
    }

}
