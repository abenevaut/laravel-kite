<template>
    <Head :title="title" />

    <Layout>
        <Title :title="title" />

        <div class="mb-4">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div
            v-if="verificationLinkSent"
            class="px-4 py-3 mb-1 bg-dark-50 border-l-2 text-green-500 bg-opacity-20 border-green-500 font-medium text-sm"
        >
            <p>
                A new verification link has been sent to the email address you provided during registration.
            </p>
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">

                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Resend Verification Email
                </PrimaryButton>

<!--                <Link-->
<!--                    :href="route('logout')"-->
<!--                    method="post"-->
<!--                    as="button"-->
<!--                    class="block px-4 py-2 mt-6 text-sm font-bold text-center text-white uppercase bg-primary hover:bg-primary-100">-->
<!--                    Log Out-->
<!--                </Link>-->
            </div>
        </form>
    </Layout>
</template>

<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
import Title from '@abenevaut/gamepro/dist/js/Components/PipelineTitleComponent.vue';
import PrimaryButton from '@abenevaut/gamepro/dist/js/Components/PipelinePrimaryButtonComponent.vue';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
const title = 'Email Verification';
</script>
