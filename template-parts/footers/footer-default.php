<footer class="border-t border-gray-200 bg-gray-950 text-gray-300">

    <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            <!-- About -->
            <div>

                <div class="mb-6">

                    <?php
                    if ( has_custom_logo() ) {

                        the_custom_logo();

                    } else {
                        ?>

                        <h3 class="text-2xl font-bold text-white">
                            <?php bloginfo('name'); ?>
                        </h3>

                        <?php
                    }
                    ?>

                </div>

                <p class="mb-6 text-sm leading-7 text-gray-400">

                    Discover unforgettable tours, destinations, and travel experiences with our premium tourism platform.

                </p>

                <!-- Social Links -->
                <div class="flex items-center gap-4">

                    <a
                        href="#"
                        class="transition hover:text-white"
                        aria-label="Facebook"
                    >
                        Facebook
                    </a>

                    <a
                        href="#"
                        class="transition hover:text-white"
                        aria-label="Instagram"
                    >
                        Instagram
                    </a>

                    <a
                        href="#"
                        class="transition hover:text-white"
                        aria-label="LinkedIn"
                    >
                        LinkedIn
                    </a>

                </div>

            </div>

            <!-- Footer Menu -->
            <div>

                <h4 class="mb-6 text-lg font-semibold text-white">
                    Quick Links
                </h4>

                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'menu_class'     => 'space-y-3 text-sm',
                    'container'      => false,
                ]);
                ?>

            </div>

            <!-- Tours -->
            <div>

                <h4 class="mb-6 text-lg font-semibold text-white">
                    Popular Tours
                </h4>

                <ul class="space-y-3 text-sm">

                    <li>
                        <a href="#" class="transition hover:text-white">
                            Adventure Tours
                        </a>
                    </li>

                    <li>
                        <a href="#" class="transition hover:text-white">
                            Honeymoon Packages
                        </a>
                    </li>

                    <li>
                        <a href="#" class="transition hover:text-white">
                            Wildlife Tours
                        </a>
                    </li>

                    <li>
                        <a href="#" class="transition hover:text-white">
                            Cultural Experiences
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Contact -->
            <div>

                <h4 class="mb-6 text-lg font-semibold text-white">
                    Contact Info
                </h4>

                <div class="space-y-4 text-sm">

                    <p>
                        Email: info@example.com
                    </p>

                    <p>
                        Phone: +94 77 123 4567
                    </p>

                    <p>
                        Colombo, Sri Lanka
                    </p>

                </div>

            </div>

        </div>

        <!-- Bottom Footer -->
        <div class="mt-16 border-t border-gray-800 pt-6">

            <div class="flex flex-col items-center justify-between gap-4 text-sm text-gray-500 lg:flex-row">

                <p>
                    © <?php echo date('Y'); ?>
                    <?php bloginfo('name'); ?>.
                    All rights reserved.
                </p>

                <div class="flex items-center gap-6">

                    <a href="#" class="transition hover:text-white">
                        Privacy Policy
                    </a>

                    <a href="#" class="transition hover:text-white">
                        Terms & Conditions
                    </a>

                </div>

            </div>

        </div>

    </div>

</footer>