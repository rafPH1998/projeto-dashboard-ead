<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use App\Repositories\Eloquent\UploadFile;
use App\Repositories\UserRepositoryInterface;
use App\ValueObjects\Email;

class UserController extends Controller
{
    public function __construct(protected UserRepositoryInterface $repository)
    {
    }

    public function index(Request $request)
    {
        $users = $this->repository
                    ->getAll($request->filter ?? '');        
   
        return view('admin.users.index', [
            'users' => convertItemsOfArrayToObject($users)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUpdateUser $request, UploadFile $uploadFile, User $user)
    {
        try {
            
            $user->fill([
                'name'     => $request->get('name'),
                'email'    => new Email($request->get('email')),
                'password' => $request->get('password'),
                'image'    => $request->image
            ]);

            if ($user['image']) {
                $user['image'] = $uploadFile->store($request->image, 'users');
            }
    
            $user->save();
    
            return redirect()->route('users.index')
                            ->with('success', 'Usuário cadastrado com sucesso');

        } catch (\Throwable $th) {
            
            return redirect()->route('users.create')
                             ->with('error', $th->getMessage());
        }
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

    public function update(UploadFile $uploadFile, StoreUpdateUser $request, $id)
    {
        $data = $request->only(['name', 'email']);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->image) {
            $data['image'] = $uploadFile->store($request->image, 'users');
        }

        $this->repository->update($id, $data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()
                ->route('users.index')
                ->with('success', 'Usuário excluido com sucesso');
    }

}
