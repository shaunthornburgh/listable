<template>
    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
        <div v-for="listing in listings" :key="listing.id" class="group relative">
            <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-gray-100">
                <img src="images/house1.jpg" class="object-cover object-center" />
                <div class="flex items-end p-4 opacity-0 group-hover:opacity-100" aria-hidden="true">
                    <div class="w-full rounded-md bg-white bg-opacity-75 py-2 px-4 text-center text-sm font-medium text-gray-900 backdrop-blur backdrop-filter">View Property</div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between space-x-8 text-base font-medium text-gray-900 dark:text-gray-500">
                <h3>
                    <Link :href="route('listing.show', listing.id)">
                        <span aria-hidden="true" class="absolute inset-0" />
                        {{ listing.city }}
                    </Link>
                </h3>
                <p>{{ listing.beds }} beds</p>
            </div>
            <div>
                <ListingAddress class="mt-1 text-sm text-gray-500" :listing="listing" />
            </div>
            <div>
                <ListingProperties class="mt-1 text-sm text-gray-500" :listing="listing" />
            </div>
            <div>
                <ListingPrice :price="listing.price" />
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingProperties from "@/Components/ListingProperties.vue";
import ListingPrice from "@/Components/ListingPrice.vue";

defineProps({
    listings: Array
})
</script>
