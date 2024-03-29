@include('layouts.head')

<div class="flex flex-col min-h-screen">
    @include('layouts.admin-navigation')

    <div class="flex-1 flex min-h-full">
        @include('layouts.admin-sidenav')
        <div class="p-5 basis-5/6">
        <a href={{ route('admin.index') }} class="inline-block bg-main py-2.5 w-32 text-center font-bold rounded text-white shadow-md mb-3"><i class="fa-solid fa-left-long"></i> Return</a>
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl">Users</h2>
                </div>
                @if (session()->has('message'))
                    <div class="mx-auto w-4/5 pb-10">
                        Warning
                    </div>
                    <div>
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if (!empty($users))
                <table class="w-full rounded-lg overflow-hidden mt-3">
                    <tr class="bg-slate-100">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <TH>Role</th>
                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles->first()->name}}</td>
                        <td class="text-right min-w-fit">
                            <form class="inline-block w-1/3 min-w-fit confirm-delete hidden" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" id="user{{$user->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-remove inline-block w-1/3 min-w-fit show-alert-delete-box" data-id="{{ $user->id }}" data-action="{{ route('admin.user.destroy',$user->id) }}" onclick="deleteConfirmation('user{{$user->id}}')"> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                @else
                <p>No users</p>
                @endif
            </div>
        </div>
    </div>
</div>