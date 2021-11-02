<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateFormRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\User\UserService;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('admin.user.list',[
            'title' => 'Danh Sách User',
            'users' => $this->userService->get()
        ]);
    }
    public function create()
    {
        return view('admin.user.add',[
            'title' => 'Thêm User Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->userService->create($request);

        return redirect()->back();
    }

    public function show(User $user)
    {
        return view('admin.user.edit',[
            'title' => 'Chỉnh Sửa User',
            'user' => $user
        ]);
    }
    public function update(Request $request, User $user)
    {
        $result = $this->userService->update($request, $user);
        if ($result) {
            return redirect('/admin/users/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->userService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công user'
            ]);
        }

        return response()->json([ 'error' => true]);
    }
}
