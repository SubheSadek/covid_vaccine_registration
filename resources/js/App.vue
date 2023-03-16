<template>
    <router-view v-if="$route.name === 'vaccineRegistration'"></router-view>
    <Master v-else></Master>
</template>

<script>
import Master from '@/views/Main/Master.vue'
export default {
    name: 'App',
    components: {
        Master
    }
}

</script>
