<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministratorStoreRequest;
use App\Http\Requests\AdministratorUpdateRequest;
use App\Models\User;
use App\Repositories\AdministratorRepository;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function __construct(
        private AdministratorRepository $administratorRepository
    ) {
    }

    public function index()
    {
        return view('administrator.index', [
            'administrators' => $this->administratorRepository->administratorsOrderBy('name')->get()
        ]);
    }

    public function store(AdministratorStoreRequest $request)
    {
        $this->administratorRepository->store($request);

        return redirect()->route('administrator.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(AdministratorUpdateRequest $request, User $administrator)
    {
        $this->administratorRepository->update($request, $administrator);

        return redirect()->route('administrator.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(User $administrator)
    {
        $this->administratorRepository->findAdministrator($administrator)->delete();

        return redirect()->route('administrator.index')->with('success', 'Data berhasil dihapus!');
    }
}
