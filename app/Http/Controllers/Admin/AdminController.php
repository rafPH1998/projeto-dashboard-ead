<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAdmin;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Eloquent\UploadFile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(protected AdminRepository $admin_repository, protected UploadFile $uploadFile)
    {
    }

    public function index(Request $request)
    {
        $admins = $this->admin_repository->getAll($request->filter ?? '');        
   
        return view('admin.admins.index', [
            'admins' => convertItemsOfArrayToObject($admins)
        ]);
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(StoreUpdateAdmin $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);

        if ($request->image) {
            $data['image'] = $this->uploadFile->store($request->image, 'admins');
        }

        $this->admin_repository->create($data);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Usuário cadastrado com sucesso');
    }

    public function edit($id)
    {
        $admin = $this->admin_repository->findById($id);

        if (!$admin) {
            return redirect()->back();
        }

        return view('admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    public function update(UploadFile $uploadFile, StoreUpdateAdmin $request, $id)
    {
        $data = $request->only(['name', 'email']);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->image) {
            $data['image'] = $uploadFile->store($request->image, 'admins');
        }

        $this->admin_repository->update($id, $data);

        return redirect()->route('admin.index')->with('success', 'Administrador atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->admin_repository->delete($id);
        return redirect()->route('admin.index')->with('success', 'Administrador excluido com sucesso');
    }
}
