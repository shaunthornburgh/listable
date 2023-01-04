<template>
    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        <Listing v-for="listing in listings" :key="listing.id" :listing="listing" />
    </div>
</template>

<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";

defineProps({
    listings: Array
})
</script>
