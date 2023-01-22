<template>
    <Head title="title" />
    <Layout>
        <Title :title="title" />

        <form @submit.prevent="submit">
            <InputLabel :title="'Email'">
                <Input
                    autocomplete="username"
                    placeholder="Email"
                    v-model="form.email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </InputLabel>

            <InputLabel :title="'Password'">
                <InputPassword
                    autocomplete="new-password"
                    placeholder="Password"
                    v-model="form.password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
                <InputPassword
                    autocomplete="new-password"
                    placeholder="Confirm password"
                    v-model="form.password_confirmation"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </InputLabel>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Reset Password
            </PrimaryButton>
        </form>
    </Layout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
import Title from '@abenevaut/gamepro/dist/js/Components/PipelineTitleComponent.vue';
import PrimaryButton from '@abenevaut/gamepro/dist/js/Components/PipelinePrimaryButtonComponent.vue';
import Checkbox from '@abenevaut/gamepro/dist/js/Components/PipelineCheckboxComponent.vue';
import CheckboxLabel from '@abenevaut/gamepro/dist/js/Components/PipelineCheckboxLabelComponent.vue';
import Input from '@abenevaut/gamepro/dist/js/Components/PipelineInputComponent.vue';
import InputError from '@abenevaut/gamepro/dist/js/Components/PipelineInputErrorComponent.vue';
import InputLabel from '@abenevaut/gamepro/dist/js/Components/PipelineInputLabelComponent.vue';
import InputPassword from '@abenevaut/gamepro/dist/js/Components/PipelineInputPasswordComponent.vue';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const title = 'Reset Password';
</script>
