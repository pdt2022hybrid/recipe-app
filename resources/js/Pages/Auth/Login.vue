<script setup lang="ts">
import LogoSVG from '@/Components/LogoSVG.vue';
import FocusLayout from '@/Layouts/FocusLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Form } from '@primevue/forms';
import { Button, InputText, Message, Toast } from 'primevue';
import { useToast } from 'primevue/usetoast';
import { reactive } from 'vue';

const toast = useToast();

const initialValues = reactive({
    email: '',
});

const form = useForm({
    email: '',
    password: '',
});

const resolver = ({ values }) => {
    const errors = {};

    if (!values.email) {
        errors.email = [{ message: 'Email is required.' }];
    }

    return {
        errors,
    };
};

const onFormSubmit = (event: {
    valid: boolean;
    states: {
        email: { value: string };
        password: { value: string };
    };
}) => {
    if (event.valid) {
        form.email = event.states.email.value;
        form.password = event.states.password.value;

        console.log(form);

        // submit();

        toast.add({
            severity: 'success',
            summary: 'Form is submitted.',
            life: 3000,
        });
    }
};

const submit = () => {
    form.post(route('login'));
};
</script>

<template>
    <FocusLayout>
        <main>
            <div class="image-div">
                <img src="../../../assets/img/auth.png" alt="flower image" />
            </div>
            <div class="form-div-wrapper">
                <div class="form-div">
                    <Toast />

                    <LogoSVG class="logo-svg" />

                    <Form
                        v-slot="$form"
                        :initialValues
                        :resolver
                        @submit="onFormSubmit"
                        class="flex w-full flex-col gap-4 sm:w-56"
                    >
                        <div class="flex flex-col gap-1">
                            <label> Email </label>
                            <InputText
                                name="email"
                                type="text"
                                placeholder="Email"
                                fluid
                                id="email"
                            />
                            <Message
                                v-if="$form.email?.invalid"
                                severity="error"
                                size="small"
                                variant="simple"
                                >{{ $form.email.error?.message }}
                            </Message>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label> Password </label>
                            <InputText
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Password"
                                fluid
                            />
                            <Message
                                v-if="$form.password?.invalid"
                                severity="error"
                                size="small"
                                variant="simple"
                                >{{ $form.password.error?.message }}
                            </Message>
                        </div>
                        <Button
                            type="submit"
                            severity="primary"
                            label="Submit"
                        />
                    </Form>
                </div>
                <img
                    class="vector1"
                    src="../../../assets/vector1.svg"
                    alt="vector image"
                />
                <img
                    class="vector2"
                    src="../../../assets/vector2.svg"
                    alt="vector image"
                />
            </div>
        </main>
    </FocusLayout>
</template>

<style scoped lang="sass">
main
    @apply grid grid-rows-1
    grid-template-columns: 35% 65%
    height: 1000px

    .image-div
        img
            @apply w-full object-cover

    .form-div-wrapper
        @apply flex items-center justify-center

    .form-div
        width: 40%
        @apply flex flex-col items-center justify-center gap-12
        @apply pb-24
        @apply text-white

        input, input:hover
            @apply bg-transparent border-2 border-white text-white

        input::placeholder
            @apply text-white

        button, button:hover
            @apply bg-white text-black

.vector1
    @apply absolute -z-10
    right: -25rem
    top: -1rem

.vector2
    @apply absolute -z-10
    bottom: -48rem
    right: -22rem
</style>
