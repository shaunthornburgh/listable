<template>
    <Filters :filters="filters" />
    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
    </div>

    <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
        <Pagination :links="listings.links" />
    </div>
</template>

<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from '@/Pages/Listing/Index/Components/Filters.vue'

defineProps({
    listings: Object,
    filters: Object
})
</script>
