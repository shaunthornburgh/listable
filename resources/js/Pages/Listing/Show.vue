<template>
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-200">Men</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <a href="#" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-200">Clothing</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>

                <li class="text-sm">
                    <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Basic Tee 6-Pack</a>
                </li>
            </ol>
        </nav>

        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            <div class="aspect-w-3 aspect-h-2 hidden overflow-hidden rounded-lg lg:block lg:row-span-2 lg:col-span-2">
                <img src="/images/house1.jpg" alt="Two each of gray, white, and black shirts laying flat." class="h-full w-full object-cover object-center">
            </div>
            <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="aspect-w-3 aspect-h-2 overflow-hidden rounded-lg">
                    <img src="/images/house1.jpg" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
                </div>
                <div class="aspect-w-3 aspect-h-2 overflow-hidden rounded-lg">
                    <img src="/images/house1.jpg" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
                </div>
            </div>
        </div>

        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-3xl"><ListingAddress :listing="listing" /></h1>

                <h3><ListingProperties :listing="listing" /></h3>
                <h3><ListingPrice :price="listing.price" /></h3>
            </div>

            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <div class="border-b-2 border-gray-200 pb-10">
                    <p class="text-3xl tracking-tight text-gray-900 dark:text-gray-200">Make An Offer</p>

                    <form class="mt-4">
                        <div >
                            <label for="about" class="block text-sm font-medium text-gray-700">Details</label>
                            <div class="mt-1">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Write some additional information for the seller about your offer.</p>
                        </div>
                        <button type="submit" class="mt-4 flex w-full items-center justify-center rounded-md border border-transparent bg-rose-600 py-3 px-8 text-base font-medium text-white hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">Submit</button>
                    </form>
                </div>

                <div class="mt-10">
                    <p class="text-3xl tracking-tight text-gray-900 dark:text-gray-200">Mortgage Calculator</p>

                    <div class="mt-4">
                        <label class="label">Interest rate ({{ interestRate }}%)</label>
                        <input v-model.number="interestRate"
                            type="range" min="0.1" max="30" step="0.1"
                            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        />

                    </div>
                    <div class="mt-4">
                        <label class="label">Duration ({{ duration }} years)</label>
                        <input v-model.number="duration"
                            type="range" min="3" max="35" step="1"
                            class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                        />
                    </div>
                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">Your monthly payment</div>
                        <ListingPrice :price="monthlyPayment" class="text-3xl" />
                    </div>
                    <div class="mt-2 text-gray-500">
                        <div class="flex justify-between">
                            <div>Total paid</div>
                            <div>
                                <ListingPrice :price="totalPaid" class="font-medium" />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Principal paid</div>
                            <div>
                                <ListingPrice :price="listing.price" class="font-medium" />
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>Interest paid</div>
                            <div>
                                <ListingPrice :price="totalInterest" class="font-medium" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>

                    <div class="space-y-6">
                        <p class="text-base text-gray-900 dark:text-gray-200">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-gray-200">Highlights</h3>

                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>

                            <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900 dark:text-gray-200">Details</h2>

                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import ListingProperties from '@/Components/ListingProperties.vue'
import ListingPrice from '@/Components/ListingPrice.vue'
import { ref } from 'vue'
import {useMonthlyPayment} from "@/Composables/useMonthlyPayment";

const interestRate = ref(2.5)
const duration = ref(25)

const props = defineProps({
    listing: Object,
})

const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(props.listing.price, interestRate, duration)

</script>
