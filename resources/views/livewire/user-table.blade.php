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
                    <th><input type="checkbox" name="selectAll" wire:model="selectAll"> </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($checked) > 0)
                    <tr class="bg-pink-100">
                        <td colspan="12">
                            <div class="row">
                                <div class="col-md-9 pull-left">
                                    You have selected ({{ count($checked) }})
                                    {{ Str::plural('Row', count($checked)) }}
                                    &nbsp; Do you want to select all? &nbsp;
                                    <a href="javascript:()" wire:click="SelectAllRecord()">Yes</a>
                                </div>
                                <div class="col-md-3 pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-flat btn-sm" wire:click="BulkExport()"><i
                                                class="fa fa-file-excel-o"></i>Bulk Export</button>
                                        <button class="btn btn-danger btn-flat btn-sm" wire:click="openDeleteModal()"><i
                                                class="fa fa-trash"></i>Bulk Delete</button>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endif
                @forelse ($users as $user)
                    <tr class="{{ $selectAll == true || in_array($user->id, $checked) ? 'bg-green-100' : '' }}">
                        <td><input type="checkbox" class="form-checkbox" value="{{ $user->id }}"
                                wire:model="checked"> </td>
                        <td>
                            <span class="mr-2">
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
                            </span>
                            <a href="" wire:click.prevent="startConversation({{ $user->id }})"
                                class="text-secondary"><i class="fa fa-comments"></i></a>
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
                                <a href="{{ route('users.edit', [$user->id]) }}"><i
                                        class="fa fa-edit fa-x2 px-2"></i></a>
                                <a href="#" wire:click.prevent="openDeleteModal({{ $user->id }})"><i
                                        class="fa fa-trash text-danger"></i></a>
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
    <x-modals.delete :data="$user" />
</div>
