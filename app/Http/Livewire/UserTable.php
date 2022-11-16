<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Jambasangsang\Flash\Facades\LaravelFlash;

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
    public $user = null;

    public function mount()
    {
        $this->currentUrl = Route::current()->getName();
    }

    public function getUsersQueryProperty()
    {
        return User::search($this->search)
            ->Role([Str::replaceFirst('users.', '', $this->currentUrl)])
            ->orderBy('id', $this->sortBy);
    }

    public function getUsersProperty()
    {
        return $this->usersQuery->paginate($this->perPage);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->checked = $this->users->pluck('id')->map(fn ($value) => (string) $value)->toArray();
        } else {
            $this->checked = [];
        }
    }

    public function updatedChecked()
    {
        if (count($this->checked) == $this->perPage) {
            $this->selectAll = true;
        } else {
            $this->selectAll = false;
        }
    }

    public function SelectAllRecord()
    {
        $this->checked = $this->usersQuery->pluck('id')->map(fn ($value) => (string) $value)->toArray();
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

    public function openDeleteModal($userId = null)
    {
        if (!empty($userId)) {
            $this->user = $userId;
        }
        $this->dispatchBrowserEvent('openModal');
    }

    public function deleteUser()
    {
        if (!empty($this->user)) {
            User::find($this->user)->delete();
        } else {
            User::whereIn('id', $this->checked)->delete();
        }
        $this->dispatchBrowserEvent('hideModal');
        $this->selectAll = false;
        $this->checked = [];
    }

    public function startConversation($userId)
    {
        $conversation = Conversation::firstOrCreate([
            'sender_id' => auth()->id(),
            'receiver_id' => $userId,

        ]);
        return redirect('messages')->with('selectedConversation', $conversation);
    }

    public function render()
    {
        // dd(User::find(50));
        if (!in_array($this->currentUrl, ['users.index'])) {
            $users = $this->users;
        } else {
            $users = [];
        }
        return view('livewire.user-table', ['users' => $users]);
    }
}
