<template>
    <Head title="503 Service Unavailable" />
    <Layout>

        <div class="px-4 py-24 text-center sm:px-16 bg-dark-400">

            <h1 class="mb-3 font-bold leading-none tracking-tighter text-xl text-primary">
                Service Unavailable
            </h1>

            <p class="text-lg">
                The server is not ready to handle the request.
            </p>

        </div>

    </Layout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
</script>
