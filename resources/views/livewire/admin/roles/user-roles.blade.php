<div class="relative">
    <div class="relative overflow-hidden">
        <table class="w-full space-y-2 collapse">
            <thead>
                <tr class="text-white">
                    <th colspan="2" class="text-left">
                        <span class="inline-block font-bold px-4 py-2 font-bold">Account</span>
                    </th>
                    <th>
                        <span class="inline-block font-bold px-4 py-2">Email address</span>
                    </th>
                    <th>
                        <span class="inline-block font-bold px-4 py-2 font-bold">Role</span>
                    </th>
                    <th>
                        <span class="inline-block font-bold px-4 py-2">Permissions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $index => $user)
                @livewire('admin.roles.user-card', ['user' => $user, 'index' => $index])
            @endforeach
            </tbody>
        </table>
    </div>
</div>
