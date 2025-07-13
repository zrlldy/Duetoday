<flux:sidebar sticky stashable
    class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc."
        class="px-2 hidden dark:flex" />



    @livewire('search-items')

    <flux:navlist variant="outline">
        <flux:navlist.group expandable heading="Task" class="hidden lg:grid gap-2">
            <x-nav-link href="/" icon="inbox" livewire:navigate>Upcoming </x-nav-link>
            <x-nav-link href="/task" icon="document-text" livewire:navigate>Tasks</x-nav-link>
            <x-nav-link href="/calendar" icon="calendar" livewire:navigate> Calendar </x-nav-link>
            <!-- {{-- <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item> -->
            <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
            <flux:navlist.ite m icon="calendar" href="#">Calendar</flux:navlist.item> --}}
            <flux:menu.separator />

        </flux:navlist.group>
        <flux:navlist.group expandable heading="List" class="hidden lg:grid">

            <!--
            {{-- <flux:navlist.item href="#">Marketing site</flux:navlist.item>
            <flux:navlist.item href="#">Android app</flux:navlist.item>
            <flux:navlist.item href="#">Brand guidelines</flux:navlist.item> --}} -->


            <livewire:add-list />

        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer />

    {{-- <flux:navlist variant="outline">
        <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
        <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
    </flux:navlist> --}}

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile name="Jerold Noynay" />

        <flux:menu>
            <flux:menu.radio.group>
                <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                <flux:menu.radio>Truly Delta</flux:menu.radio>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>

<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:spacer />

    <flux:dropdown position="top" alignt="start">
        <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

        <flux:menu>
            <flux:menu.radio.group>
                <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                <flux:menu.radio>Truly Delta</flux:menu.radio>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:header>
