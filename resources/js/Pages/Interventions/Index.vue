<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Interventions</h1>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Client</th>
                    <th class="border px-4 py-2">Technicien</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="intervention in interventions.data" :key="intervention.id">
                    <td class="border px-4 py-2">{{ intervention.id }}</td>
                    <td class="border px-4 py-2">{{ intervention.client.name }}</td>
                    <td class="border px-4 py-2">{{ intervention.user.name }}</td>
                    <td class="border px-4 py-2">{{ intervention.status }}</td>
                    <td class="border px-4 py-2">
                        <inertia-link :href="route('interventions.show', intervention.id)"
                            class="text-blue-600 hover:underline">View</inertia-link>
                        <inertia-link :href="route('interventions.edit', intervention.id)"
                            class="text-yellow-600 hover:underline ml-2">Edit</inertia-link>
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination :links="interventions.links" />
    </div>
</template>

<script setup>
import Pagination from '@/Components/Pagination.vue';
defineProps({
    interventions: Object,
});
</script>
