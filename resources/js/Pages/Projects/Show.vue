<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateProjectForm from './Partials/UpdateProjectForm.vue';

defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <UpdateProjectForm class="max-w-xl" :project="project"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
