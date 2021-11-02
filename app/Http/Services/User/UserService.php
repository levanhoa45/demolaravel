<?php

namespace App\Http\Services\User;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function create($request)
    {
       try{
        User::create([
            'name' => (string) $request->input('name'),
            'email' => (string) $request->input('email'),
            'password' => (string) $request->input('password'),
        ]);

        Session::flash('success', 'Tạo User Thành Công');
       }catch(\Exception $err){
        Session::flash('error', $err->getMessage());
        return false;
       }

       return true;
    }
    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    public function update($request, $user)
    {
        try{
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('success', 'Cập nhật lỗi');
            \Log::info($err->getMessage());
            return  false;
        }
        return true;
    }
    public function delete($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if($user){
            $user->delete();
            return true;
        }
        return false;
    }
}