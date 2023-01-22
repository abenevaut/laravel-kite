<template>
    <Head title="500 Internal Server Error" />
    <Layout>

        <div class="px-4 py-24 text-center sm:px-16 bg-dark-400">

            <h1 class="mb-3 font-bold leading-none tracking-tighter text-xl text-primary">
                Internal Server Error
            </h1>

            <p class="text-lg">
                The server has encountered a situation it does not know how to handle.
            </p>

            <label class="block mt-6 mb-12">
                <Link
                    class="inline-flex items-center px-3 py-2 text-white border border-white text-md border-opacity-5 text-opacity-70 hover:border-opacity-10 hover:text-opacity-100"
                    :href="route('home')"
                >
                    <i ya-icon="icon: long-arrow-left;class: mr-2;"></i> Back to home
                </Link>
            </label>

        </div>

    </Layout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
</script>
