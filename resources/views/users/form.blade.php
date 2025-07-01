<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="p-6">
        <x-form method="{{ isset($user) ? 'put' : 'post' }}" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" class="space-y-6">
            <x-input
                type="text"
                label="Name"
                name="name"
                :value="old('name', isset($user) ? $user->name : '')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input
                type="email"
                label="Email"
                name="email"
                :value="old('email', isset($user) ? $user->email : '')"
                required
                autocomplete="email"
            />

            <x-input
                type="password"
                label="Password"
                name="password"
                {{ isset($user) ? '' : 'required' }}
                autocomplete="new-password"
            />

            <x-input
                type="password"
                label="Confirm Password"
                name="password_confirmation"
                {{ isset($user) ? '' : 'required' }}
                autocomplete="new-password"
            />

            <div>
                <x-label for="role" value="Role" />
                <select
                    id="role"
                    name="role"
                    required
                    class="mt-1 block w-full rounded-lg border border-gray-200 border-b-gray-300/80 bg-white dark:bg-white/10 dark:border-white/10 px-3 py-2 text-gray-700 dark:text-gray-300 shadow-xs focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:focus:border-blue-400 dark:focus:ring-blue-400 @error('role') border-red-500 @enderror"
                >
                    <option value="">Select Role</option>
                    <option value="admin" {{ (old('role', isset($user) ? $user->role : '') == 'admin') ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ (old('role', isset($user) ? $user->role : '') == 'petugas') ? 'selected' : '' }}>Petugas</option>
                    <option value="manajer" {{ (old('role', isset($user) ? $user->role : '') == 'manajer') ? 'selected' : '' }}>Manajer</option>
                </select>
                <x-error for="role" />
            </div>

            <div class="flex items-center justify-end gap-4 mt-4">
                <x-button variant="secondary" href="{{ route('users.index') }}">
                    Cancel
                </x-button>
                <x-button type="submit">
                    {{ isset($user) ? 'Update' : 'Create' }} User
                </x-button>
            </div>
        </x-form>
    </div>
</div>
