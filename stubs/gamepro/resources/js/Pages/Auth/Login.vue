<template>
    <Head :title="title" />
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
            </InputLabel>

            <InputLabel :title="'Password'">
                <InputPassword
                    autocomplete="new-password"
                    placeholder="Password"
                    v-model="form.password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </InputLabel>

            <div class="sm:flex">
                <label class="flex items-center">
                    <CheckboxLabel
                        :title="'Remember me'"
                    >
                        <Checkbox name="remember" v-model:checked="form.remember" />
                    </CheckboxLabel>
                </label>
                <Link
                    v-if="canResetPassword"
                    class="inline-block mt-5 ml-auto underline text-md text-primary hover:text-white sm:mt-0"
                    :href="route('password.request')"
                >
                    Forgot your password?
                </Link>
            </div>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                {{ title }}
            </PrimaryButton>

        </form>
    </Layout>
</template>

<script setup>
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
import Layout from '@abenevaut/gamepro/dist/js/Layouts/PipelineLayout.vue';
import Title from '@abenevaut/gamepro/dist/js/Components/PipelineTitleComponent.vue';
import PrimaryButton from '@abenevaut/gamepro/dist/js/Components/PipelinePrimaryButtonComponent.vue';
import Checkbox from '@abenevaut/gamepro/dist/js/Components/PipelineCheckboxComponent.vue';
import CheckboxLabel from '@abenevaut/gamepro/dist/js/Components/PipelineCheckboxLabelComponent.vue';
import Input from '@abenevaut/gamepro/dist/js/Components/PipelineInputComponent.vue';
import InputError from '@abenevaut/gamepro/dist/js/Components/PipelineInputErrorComponent.vue';
import InputLabel from '@abenevaut/gamepro/dist/js/Components/PipelineInputLabelComponent.vue';
import InputPassword from '@abenevaut/gamepro/dist/js/Components/PipelineInputPasswordComponent.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
        required: true,
    },
    status: {
        type: String,
        default: null,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const title = 'Log in';
</script>
