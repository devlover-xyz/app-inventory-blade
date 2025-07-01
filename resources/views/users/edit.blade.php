<x-layouts.app :title="__('Edit Users')">

    <section class="w-full">
        <div class="relative mb-6 w-full">
            <x-heading size="xl" level="1">{{ __('Edit User') }}</x-heading>
            <x-subheading size="lg" class="mb-6">{{ __('Edit user information') }}</x-subheading>
            <x-separator />
        </div>

        @include('users.form')

    </section>
</x-layouts.app>
