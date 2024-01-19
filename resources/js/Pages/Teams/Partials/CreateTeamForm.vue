<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({

});

const user = usePage().props.auth.user;

const form = useForm({
    team_name: '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Create Team</h2>
        </header>

        <form @submit.prevent="form.post(route('teams.store'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="team_name" value="Name" />

                <TextInput
                    id="team_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.team_name"
                    required
                    autofocus
                    autocomplete="team_name"
                />

                <InputError class="mt-2" :message="form.errors.team_name" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
