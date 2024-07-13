<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import AppLayout from '@abenevaut/gamepro/dist/js/Layouts/BlankLayout.vue';
import Header from '@abenevaut/gamepro/dist/js/Components/HeaderComponent.vue';
import LeftNavigation from '@abenevaut/gamepro/dist/js/Components/LeftNavigationHeaderComponent.vue';
import MobileNavigation from '@abenevaut/gamepro/dist/js/Components/MobileNavigationHeaderComponent.vue';
import Footer from '@abenevaut/gamepro/dist/js/Components/FooterComponent.vue';
import BottomNavigation from '@abenevaut/gamepro/dist/js/Components/BottomNavigationFooterComponent.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <AppLayout>
        <Header>
            <Link
                class="mr-4 lg:ml-2"
                :href="route('home')"
            >
                <ApplicationLogo />
            </Link>
            <LeftNavigation>
                <Link
                    class="hidden lg:inline-flex items-center h-full mx-2 text-sm font-bold uppercase text-white hover:text-primary hover:shadow-inner"
                    exact-active-class="text-primary shadow-inner"
                    :href="route('home')"
                >
                    Home
                </Link>
            </LeftNavigation>
            <div v-if="usePage().props.value.auth.check">
                <Link
                    class="hidden mr-5 text-sm font-bold uppercase text-primary hover:underline lg:inline-block"
                    :href="route('profile.edit')"
                >
                    Profile
                </Link>
                <Link
                    class="hidden px-3 py-2 text-sm font-bold text-white uppercase lg:inline-block bg-primary hover:bg-primary-100"
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Logout
                </Link>
            </div>
            <div v-else>
                <Link
                    v-if="usePage().props.value.auth.canRegister"
                    class="hidden mr-5 text-sm font-bold uppercase text-primary hover:underline lg:inline-block"
                    :href="route('register')"
                >
                    Register
                </Link>
                <Link
                    v-if="usePage().props.value.auth.canLogin"
                    class="hidden px-3 py-2 text-sm font-bold text-white uppercase lg:inline-block bg-primary hover:bg-primary-100"
                    :href="route('login')"
                >
                    LoginInertia
                </Link>
            </div>
            <MobileNavigation>
                <Link
                    class="lg:inline-flex items-center h-full mx-2 text-sm font-bold uppercase text-white hover:text-primary hover:shadow-inner"
                    exact-active-class="text-primary shadow-inner"
                    :href="route('home')"
                >
                    Home
                </Link>
            </MobileNavigation>
        </Header>

        <div
            v-if="usePage().props.value.auth.check && null === usePage().props.value.auth.user.email_verified_at"
            class="py-2 sm:py-4"
        >
            <div class="container">

                <div class="px-4 py-3 mb-1 bg-dark-50 border-l-2 text-primary bg-opacity-20 border-primary font-medium text-md">
                    <p>
                        Remplissez votre profil pour apparaitre dans l'annuaire
                    </p>
                </div>

            </div>
        </div>

        <slot/>
        <Footer>

            <BottomNavigation class="mt-0">

                <p class="mb-6 leading-normal text-gray-500 text-md lg:mb-0">
                    Copyright &copy; 2022 <a class="hover:underline hover:text-primary" href="https://www.abenevaut.dev" target="_blank">www.abenevaut.dev</a>. All rights reserved.
                </p>

                <div>
                    <a
                        class="text-gray-500 text-md hover:underline hover:text-primary"
                        href="https://www.abenevaut.dev/terms"
                        target="_blank"
                    >
                        Terms of Services
                    </a>
                    <a
                        class="ml-4 text-gray-500 text-md hover:underline hover:text-primary"
                        href="https://www.abenevaut.dev/privacy"
                        target="_blank"
                    >
                        Privacy
                    </a>
                </div>

            </BottomNavigation>

        </Footer>
    </AppLayout>
</template>
