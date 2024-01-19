<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    users: {
        type: Array,
        required: true,
    },
    team_id: {
        type: Number,
        required: true,
    },
});

// const selectedUsers = [];

// const user = usePage().props.auth.user;

const form = useForm({
    assigned: [],
    team_id: props.team_id,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Assign Members to this Team</h2>
        </header>

        <form @submit.prevent="form.post(route('teams.members.store', team_id))" class="mt-6 space-y-6">
            <div>
                <input type="hidden" name="team_id" :value="team_id" />
                <InputLabel for="assigned" value="Available Members" />

                <ul>
                    <li v-for="user in users">
                        <input type="checkbox" :id="'user'+ user.id" @click="form.assigned.push(user.id)"> &nbsp;
                        <label :for="user.name" style="p-3">{{user.name}}</label>
                    </li>
                </ul>

                <InputError class="mt-2" :message="form.errors.assigned" />
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
