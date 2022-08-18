<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Requests\StoreUser;
use App\Repositories\Eloquent\UploadFile;

class UserController extends Controller
{
    public function __construct(protected UserRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $users = $this->repository->getAll(
            $request->get('filter', '')
        );        

        return view('admin.users.index', [
            'users' => convertItemsOfArrayToObject($users)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUser $request, UploadFile $uploadFile)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $data['image'] = $uploadFile->store($request->image, 'users');
        }

        $this->repository->create($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário cadastrado com sucesso');
    }

    public function edit($id)
    {
        $user = $this->repository->findById($id);

        if (!$user) {
            return redirect()->back();
        }

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(UploadFile $uploadFile, StoreUser $request, $id)
    {
        $data = $request->only(['name', 'email']);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->image) {
            $data['image'] = $uploadFile->store($request->image, 'users');
        }

        $this->repository->update($id, $data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
    }

}
