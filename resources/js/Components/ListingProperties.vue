<template>
    <span>{{ listing.beds }} beds | {{ listing.baths }} baths | {{ listing.area}} sqft</span>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>
