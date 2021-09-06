<tr class="bg-white">
    <td class="w-12 h-12 pl-4 rounded-l-md">
        <img src="{{ asset('images/default.gif') }}" class="w-8 h-8 rounded-full"/>
    </td>
    <td class="py-4 pr-4">
        <span class="inline-block font-bold pl-4 pr-4 font-bold">{{ $user->first_name . ' ' . $user->last_name }}</span>
    </td>
    <td class="py-4 px-4">
        <span class="inline-block font-bold pl-4 pr-4 font-bold">Account</span>
    </td>
    <td class="py-4 px-4">
        <span class="inline-block font-bold pl-4 pr-4 font-bold">{{ $user->roles->pluck('name')->first() }}</span>
    </td>
    <td class="py-4 px-4 rounded-r-md">

    </td>
</tr>
