<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateTeamForm from './Partials/UpdateTeamForm.vue';

defineProps({
    team: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Team" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teams</h2>
        </template>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <UpdateTeamForm class="max-w-xl" :team="team"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
