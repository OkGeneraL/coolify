<div>
    <x-slot:title>
        Team Admin | Coolify
    </x-slot>
    <x-team.navbar />
    <h2>Admin View</h2>
    <div class="subtitle">
        Manage users of this instance.
    </div>
    <form wire:submit="submitSearch" class="flex flex-col gap-2 lg:flex-row">
        <x-forms.input wire:model="search" placeholder="Search for a user" />
        <x-forms.button type="submit">Search</x-forms.button>
    </form>
    <h3 class="py-4">Users</h3>
    <div class="grid grid-cols-1 gap-2 lg:grid-cols-2">
        @forelse ($users as $user)
            <div wire:key="user-{{ $user->id }}"
                class="flex items-center justify-center gap-2 bg-white box-without-bg dark:bg-coolgray-100">
                <div>{{ $user->name }}</div>
                <div>{{ $user->email }}</div>
                <div class="flex-1"></div>
                <div class="flex items-center justify-center gap-2 mx-4 text-xs font-bold ">
                    <x-modal-confirmation title="Confirm User Deletion?" buttonTitle="Delete" isErrorButton
                        submitAction="delete({{ $user->id }})" :actions="[
                            'The selected user will be permanently deleted from Coolify\'s database.',
                            'All resources (application, databases, services, configurations, servers, private keys, tags, etc.) related to this user\'s default team will be deleted from Coolify\'s database.',
                        ]"
                        confirmationText="{{ $user->name }}"
                        confirmationLabel="Please confirm the execution of the actions by entering the User Name below"
                        shortConfirmationLabel="User Name" />
                </div>
            </div>
        @empty
            <div>No users found other than the root.</div>
        @endforelse
        @if ($lots_of_users)
            <div>There are more users than shown. Please use the search bar to find the user you are looking for.</div>
        @endif
    </div>
</div>
