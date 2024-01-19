<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateTeamForm from './Partials/CreateTeamForm.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    teams: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head title="Teams" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teams</h2>
        </template>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <CreateTeamForm class="max-w-xl" />
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <ul v-if="teams.length > 0">
                        <li v-for="(team, index) in teams" :key="index"  class="w-120">
                            <div>
                                <div class=" float-left">
                                    <Link :href="route('teams.show', team.id)"  as="button" class="color: bg-indigo-400 font-bold p-3 m-3"> Edit ></Link>
                                    <Link :href="route('teams.members.show', team.id)"  as="button" class="color: bg-gray-200 font-bold p-3 m-3"> Assign Members ></Link>
                                </div>
                                <div class="p-5 m-4"> <b>Name</b>: {{team.team_name}} - <b>Users:</b> {{team.users.length}} </div>
                            </div>
                        </li>
                    </ul>
            
                    <p v-else>There are no teams created yet</p>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
