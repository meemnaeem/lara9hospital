<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;

class UserTable extends Component
{
    use WithPagination;

    public $currentUrl;
    // public $users = [];
    public $selectAll = false;
    public $checked = [];
    public $perPage = 5;
    public $sortBy = 'desc';
    public $search = '';

    public function mount()
    {
        $this->currentUrl = Route::current()->getName();
    }

    public function getUserDataByRole($role)
    {
        $this->emit('urlChange', $role);
        $this->currentUrl = $role;
        $this->resetPage();
    }

    public function changeStatus($userId, $status)
    {
        // dd($status);
        $updateStatus = $status == 0 ? 1 : 0;
        User::find($userId)->update(['status' => $updateStatus]);
    }

    public function render()
    {
        // dd(User::find(50));
        if (!in_array($this->currentUrl, ['users.index'])) {
            $users = User::search($this->search)
            ->Role([Str::replaceFirst('users.', '', $this->currentUrl)])
            ->orderBy('id', $this->sortBy)
            ->paginate($this->perPage);
        } else {
            $users = [];
        }
        return view('livewire.user-table', ['users' => $users]);
    }
}
