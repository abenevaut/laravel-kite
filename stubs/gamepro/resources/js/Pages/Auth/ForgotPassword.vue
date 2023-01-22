<template>
    <Head title="title" />
    <Layout>
        <Title :title="title" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <InputLabel :title="'Email'">
                <Input
                    autofocus
                    autocomplete="username"
                    placeholder="Email"
                    v-model="form.email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
                <small class="block mt-2 text-sm text-white text-opacity-50">We'll send you a verifier link to your email address.</small>
            </InputLabel>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Submit
            </PrimaryButton>
        </form>
    </Layout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
import Title from '@abenevaut/gamepro/dist/js/Components/PipelineTitleComponent.vue';
import PrimaryButton from '@abenevaut/gamepro/dist/js/Components/PipelinePrimaryButtonComponent.vue';
import Input from '@abenevaut/gamepro/dist/js/Components/PipelineInputComponent.vue';
import InputError from '@abenevaut/gamepro/dist/js/Components/PipelineInputErrorComponent.vue';
import InputLabel from '@abenevaut/gamepro/dist/js/Components/PipelineInputLabelComponent.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};

const title = 'Forgot Password';
</script>
