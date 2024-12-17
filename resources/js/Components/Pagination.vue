<template>
    <div class="flex justify-center mt-4">
        <ul class="inline-flex -space-x-px">
            <li v-for="link in links" :key="link.label">
                <a :href="link.url" v-html="link.label" class="px-4 py-2 border rounded"
                    :class="{ 'bg-gray-200': link.active }"></a>
            </li>
        </ul>
    </div>
</template>

<script setup>
defineProps({
    links: Array,
});
</script>
