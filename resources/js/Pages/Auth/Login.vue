<script setup lang="ts">
import LogoSVG from '@/Components/LogoSVG.vue';
import FocusLayout from '@/Layouts/FocusLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Form, FormSubmitEvent } from '@primevue/forms';
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

const onFormSubmit = (event: FormSubmitEvent) => {
    if (event.valid) {
        form.email = event.states.email.value;
        form.password = event.states.password.value;

        submit();
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
                        class="flex w-full flex-col gap-4"
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
                            label="Log in"
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
    @apply relative min-h-screen grid grid-rows-1 overflow-hidden grid-cols-1 lg:grid-cols-[50%,50%] xl:grid-cols-[35%,65%]

    //grid-template-columns: 35% 65%

    .image-div
        @apply hidden lg:block
        img
            @apply w-full object-cover

    .form-div-wrapper
        @apply flex items-center justify-center py-12

    .form-div
        @apply flex flex-col items-center justify-center gap-12
        @apply pb-24
        @apply text-white
        @apply w-[70%] md:w-[50%] lg:w-[45%]

        input, input:hover
            @apply bg-transparent border-2 border-white text-white

        input::placeholder
            @apply text-white

        button, button:hover
            @apply bg-white text-black

.vector1
    @apply absolute -z-10 max-w-[200%]
    @apply right-[-3rem] w-[120%]
    @apply lg:right-[-25rem] lg:top-[-1rem] lg:w-[110%]

.vector2
    @apply absolute -z-10
    bottom: -48rem
    right: -22rem
</style>
