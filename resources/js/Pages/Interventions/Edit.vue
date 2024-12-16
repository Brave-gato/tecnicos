<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Edit Intervention</h1>
        <form @submit.prevent="submit">
            <label class="block mb-2">
                Client
                <select v-model="form.client_id" class="form-select mt-1 block w-full">
                    <option v-for="client in clients" :value="client.id" :key="client.id">
                        {{ client.name }}
                    </option>
                </select>
            </label>
            <label class="block mb-2">
                Status
                <input type="text" v-model="form.status" class="form-input mt-1 block w-full" />
            </label>
            <label class="block mb-2">
                Details
                <textarea v-model="form.details" class="form-textarea mt-1 block w-full"></textarea>
            </label>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</template>

<script setup>
defineProps({
    clients: Array,
    intervention: Object,
});

import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = reactive({
    client_id: intervention?.client_id || '',
    status: intervention?.status || '',
    details: intervention?.details || '',
});

const { put } = useForm(form);

const submit = () => {
    put(route('interventions.update', { id: intervention.id }));
};
</script>
