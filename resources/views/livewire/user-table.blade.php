<div>
    <div class="page-title mb-3">
        {{ Request()->segment(2) ? Str::upper(Request()->segment(2)) : 'Users' }}
        <div class="float-right">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add New User</a>
        </div>
    </div>
    @include('backend.admins.users.header')

    <div class="card">
        <div class="card-header">
            <div class="flex items-center justify-center float-left pr-2">
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <label for="perPage" class="text-sm font-medium">
                        Per Page
                    </label>
                    <x-selectbox wire="perPage" name=""
                        class="h-8 text-sm pr-8 pl-1 text-center leading-none transition duration-75 border-gray-200 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600">
                        @foreach (App\Jambasangsang\Helper::getPerPageNumber() as $key => $perpage)
                            <option value="{{ $key }}">{{ $loop->first ? $perpage : $key }}</option>
                        @endforeach
                    </x-selectbox>
                    <label for="perPage" class="text-sm font-medium">
                        Sort By
                    </label>
                    <x-selectbox wire="sortBy" name=""
                        class="h-8 w-24 text-sm pr-8 pl-1 text-center leading-none transition duration-75 border-gray-200 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600">
                        <option value="asc">Asc</option>
                        <option value="desc">Desc</option>
                    </x-selectbox>
                </div>
            </div>
            <div class="flex float-right">
                <x-searchbox name="search" placeholder="" />
            </div>
        </div>

        <table class="table mb-0 table-borderless">
            <thead>
                <tr>
                    <th><input type="checkbox" name="selectAll" wire:click.prevent="selectAll"> </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th><input type="checkbox" name="select" wire:click.prevent="select"> </th>
                        <td>
                            <h2 class="table-avatar">
                                <a href="#" class="avatar">
                                    <img src="" width="50" class="img-rounded" alt="">
                                </a>
                                <a href="#">{{ $user->name }} <span>
                                        @foreach ($user->getRoleNames() as $role)
                                            {{ Str::ucfirst(str_replace('-', ' ', $role)) }}
                                        @endforeach
                                    </span></a>
                            </h2>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ App\Jambasangsang\Helper::getGenderValue($user->gender) }}</td>
                        {{-- <td>{{ App\Jambasangsang\Helper::getStatusValue($user->status) }}</td> --}}
                        <td>
                            <div class="status-toggle">
                                <input type="checkbox" id="status{{ $user->id }}"
                                    {{ App\Jambasangsang\Helper::getStatusValue($user->status) }}
                                    wire:click="changeStatus('{{ $user->id }}', {{ $user->status }})"
                                    class="check">
                                <label for="status{{ $user->id }}" class="checktoggle">checkbox</label>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="#"><i class="fa fa-edit fa-x2 px-2"></i></a>
                                <a href="#"><i class="fa fa-trash text-danger"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12">
                            <x-notfound />
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        @if (!empty($users))
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @endif
    </div>

</div>
