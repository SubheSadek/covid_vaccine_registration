<template>
    <Master v-if="$store.state.authUser"></Master>
    <router-view v-else-if="!$store.state.authUser && $route.name === 'register'"></router-view>
    <SignIn v-else></SignIn>
</template>

<script>
import Master from '@/views/Main/Master.vue'
import SignIn from '@/views/Auth/SignIn.vue'
export default {
    name: 'App',
    components: {
        Master,
        SignIn
    }
}

</script>
