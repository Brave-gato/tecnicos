<template>
    <nav v-if="links.length > 3" class="flex items-center justify-center mt-4 space-x-2">
        <button v-for="(link, index) in links" :key="index" :class="[
            'px-3 py-1 border rounded',
            link.active ? 'bg-blue-500 text-white border-blue-500' : 'bg-white text-blue-500 border-gray-300',
            link.url ? 'cursor-pointer' : 'cursor-not-allowed',
        ]" :disabled="!link.url" @click.prevent="goTo(link.url)">
            <span v-html="link.label"></span>
        </button>
    </nav>
</template>

<script setup>
defineProps({
    links: Array,
});

const goTo = (url) => {
    if (url) {
        window.location.href = url;
    }
};
</script>

<style scoped>
button:disabled {
    opacity: 0.5;
}
</style>
