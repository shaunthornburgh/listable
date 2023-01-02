<template>
    <div class="mx-auto max-w-3xl">
        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="create">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="mt-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-500">Create Property Listing</h3>
                    </div>

                    <div class="mt-4">
                        <div class="rounded-md bg-yellow-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: mini/exclamation-triangle -->
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Attention</h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>This information will be displayed publicly so be careful what you share.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="street-street_nr" class="label">Street number</label>
                            <div class="mt-1">
                                <input v-model="form.street_nr" type="text" name="street_nr" id="street_nr" autocomplete="street-address" class="input">
                            </div>
                            <div v-if="form.errors.street_nr" class="input-error">>
                                {{ form.errors.street_nr }}
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="street" class="label">Street address</label>
                            <div class="mt-1">
                                <input v-model="form.street" type="text" name="street" id="street" autocomplete="street-address" class="input">
                            </div>
                            <div v-if="form.errors.street" class="input-error">
                                {{ form.errors.street }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="city" class="label">City</label>
                            <div class="mt-1">
                                <input v-model="form.city" type="text" name="city" id="city" autocomplete="city" class="input">
                            </div>
                            <div v-if="form.errors.city" class="input-error">
                                {{ form.errors.city }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="state" class="label">State / Province</label>
                            <div class="mt-1">
                                <input v-model="form.state" type="text" name="state" id="state" autocomplete="address-level1" class="input">
                            </div>
                            <div v-if="form.errors.state" class="input-error">
                                {{ form.errors.state }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="code" class="label">ZIP / Postal code</label>
                            <div class="mt-1">
                                <input v-model="form.code" type="text" name="code" id="code" autocomplete="code" class="input">
                            </div>
                            <div v-if="form.errors.code" class="input-error">
                                {{ form.errors.code }}
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="country_id" class="label">Country</label>
                            <div class="mt-1">
                                <select v-model="form.country_id" id="country_id" name="country_id" autocomplete="country_id" class="input">
                                    <option v-for="country in countries" :key="country.id" :value="country.id">
                                        {{ country.name }} ({{ country.code}})
                                    </option>
                                </select>
                            </div>
                            <div v-if="form.errors.country_id" class="input-error">
                                {{ form.errors.country_id }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="beds" class="label">Number of Bedrooms</label>
                            <div class="mt-1">
                                <select v-model="form.beds" id="country" name="country" autocomplete="country-name" class="input">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                            <div v-if="form.errors.beds" class="input-error">
                                {{ form.errors.beds }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="baths" class="label">Number of Bathrooms</label>
                            <div class="mt-1">
                                <select v-model="form.baths" id="baths" name="baths" autocomplete="country-name" class="input">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                            <div v-if="form.errors.baths" class="input-error">
                                {{ form.errors.baths }}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="area" class="label">Area / sqft</label>
                            <div class="mt-1">
                                <input v-model="form.area" type="text" name="area" id="area" autocomplete="area" class="input">
                            </div>
                            <div v-if="form.errors.area" class="input-error">
                                {{ form.errors.area }}
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="price" class="label">Asking Price</label>
                            <div class="mt-1">
                                <input v-model="form.price" type="text" name="price" id="price" autocomplete="price" class="input">
                            </div>
                            <div v-if="form.errors.price" class="input-error">
                                {{ form.errors.price }}
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="about" class="label">Description</label>
                            <div class="mt-1">
                                <textarea id="about" name="about" rows="3" class="input"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about the property.</p>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="cover-photo" class="label">Photos</label>
                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-rose-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-rose-500 focus-within:ring-offset-2 hover:text-rose-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="flex justify-end">
                    <button type="button" class="btn-white">Cancel</button>
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

defineProps({
    countries: Array
})

const form = useForm({
    beds: 0,
    baths: 0,
    area: 0,
    street_nr: 0,
    street: null,
    city: null,
    state: null,
    code: null,
    country_id: null,
    price: 0
})
const create = () => form.post(route('listing.store'))
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px
}
</style>
