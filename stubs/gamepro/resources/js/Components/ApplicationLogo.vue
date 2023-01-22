<template>
    <img
        :src="logo"
        :alt="usePage().props.value.app.name"
        width="48"
    />
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import Logo from '@abenevaut/maskot-2013/dist/app-icon.webp';

const logo = Logo;
</script>
