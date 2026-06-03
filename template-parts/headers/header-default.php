<header class="w-full bg-[#346065] shadow-sm border-b border-gray-100">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8">

        <!-- Logo -->
        <div class="site-logo flex items-center">

            <?php
            if ( has_custom_logo() ) {

                the_custom_logo();

            } else {
                ?>

                <a
                    href="<?php echo esc_url( home_url('/') ); ?>"
                    class="text-2xl font-bold text-gray-900"
                >
                    <?php bloginfo('name'); ?>
                </a>

                <?php
            }
            ?>

        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex">

            <?php
            wp_nav_menu([
                'theme_location' => 'primary_menu',
                'menu_class'     => 'flex items-center gap-8 text-sm font-medium text-gray-700',
                'container'      => false,
            ]);
            ?>

        </nav>

        <!-- Header Actions -->
        <div class="hidden items-center gap-4 lg:flex">

            <a
                href="/contact"
                class="rounded-full bg-blue-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Book Now
            </a>

        </div>

        <!-- Mobile Menu Button -->
        <button
            class="flex items-center justify-center rounded-md p-2 text-gray-700 lg:hidden"
            aria-label="Open Menu"
        >

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>

        </button>

    </div>

</header>