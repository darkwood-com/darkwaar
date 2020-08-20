<template>
    <div class="px-8 max-w-5xl">
        <h1 class="mb-16 text-xl font-hairline text-green-200 text-center">quote of the day</h1>
        <blockquote class="font-quote text-5xl text-center text-green-100">
            {{ quote }}
        </blockquote>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    name: 'HelloWorld',
    data() {
        return {
            quote: 'Loading...',
        }
    },
    created() {
        const apiUrl = process.env.VUE_APP_API_URL;
        axios.get(apiUrl + '/api/quote').then(response => {
            this.quote = response.data
        })
    },
}
</script>
