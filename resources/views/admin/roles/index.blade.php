@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-4 lg:p-5 basis-5/6 max-w-full overflow-hidden">
        <a href={{ route('admin.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
            <div class="bg-white rounded-lg shadow-sm p-3 lg:p-5 w-full mb-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Roles</h2>
                    <a href="{{ route('admin.role.create') }}" class="inline-block bg-main py-2.5 w-28 text-center font-bold rounded text-white shadow-md">
                        Add role
                    </a>
                </div>
                @if (!empty($roles))
                <div class="max-w-full w-full overflow-x-auto relative mx-auto mt-3">
                    <table class="w-full rounded-lg">
                        <tr class="bg-slate-100">
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col"></th>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <th scope="row whitespace-nowrap">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td class="text-right min-w-fit whitespace-nowrap">
                            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-secondary w-1/3 min-w-fit">Edit</a>
                            <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.role.destroy', $role->id) }}" method="POST" id="role{{$role->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $role->id }}" data-action="{{ route('admin.role.destroy',$role->id) }}" onclick="deleteConfirmation('role{{$role->id}}')"> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <p>No roles</p>
                @endif
            </div>
        </div>
    </div>
</div>