@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-4 lg:p-5 basis-5/6 max-w-full overflow-hidden">
            <div class="bg-white rounded-lg shadow-sm p-3 lg:p-5 w-full mb-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">User roles</h2>
                    <a href="{{ route('admin.type.create') }}" class="btn btn-primary">
                        Add roles
                    </a>
                </div>
                @if (!empty($roles))
                <div class="max-w-full w-full overflow-x-auto relative mx-auto mt-3">
                    <table class="w-full rounded-lg">
                        <tr class="bg-slate-100">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <th scope="row whitespace-nowrap">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td class="text-right min-w-fit whitespace-nowrap">
                                <form class="inline-block w-1/3 min-w-fit" action="{{ route('admin.role.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-remove w-full" type="submit">Delete</button>
                                </form>
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