<template>
    <nav class="px-4 pt-4 md:flex md:justify-between md:items-end">
        <div class="flex justify-between items-center">
            <p class="text-blue-500 text-3xl">
                Gif API
            </p>
            <div class="md:hidden">
                <button v-if="currentUrl !== '/login'" @click="isOpen = !isOpen" class="py-2 px-3 border-blue-500 text-blue-500 hover:border-blue-800 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 26 26" style="fill:#000000;">
                        <path d="M 0 4 L 0 6 L 26 6 L 26 4 Z M 0 12 L 0 14 L 26 14 L 26 12 Z M 0 20 L 0 22 L 26 22 L 26 20 Z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div v-if="currentUrl !== '/login'" :class="isOpen ? 'block' : 'hidden'" class="text-md md:flex">
            <a class="mr-4 nav-link" href="/create" v-bind:class="{'nav-link-active': (currentUrl === '/create')}">
                Create
            </a>
            <a class="mr-4 nav-link" href="/edit" v-bind:class="{'nav-link-active': (currentUrl === '/edit')}">
                Edit
            </a>
            <a class="mr-4 nav-link" href="/delete" v-bind:class="{'nav-link-active': (currentUrl === '/delete')}">
                Delete
            </a>
            <a class="mr-4 nav-link" href="/logout">
                Logout
            </a>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                isOpen: false,
                currentUrl: window.location.pathname,
            }
        },
    };
</script>
