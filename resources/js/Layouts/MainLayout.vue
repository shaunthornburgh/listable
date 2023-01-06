<template>
    <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-500 shadow-sm lg:static lg:overflow-y-visible">
        <NavBar :user="user"/>
    </header>

    <main class="max-w-7xl mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'
import NavBar from "@/Components/UI/NavBar.vue";

const page = usePage();
const flashSuccess = computed (
    () => page.props.value.flash.success
)
const user = computed(
    () => page.props.value.user,
)
</script>
