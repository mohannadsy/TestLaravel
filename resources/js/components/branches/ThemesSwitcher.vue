<template>

</template>

<script lang="ts">
    import {defineComponent} from 'vue'
    export default defineComponent ( {
        name: "ThemesSwitcher" ,
        setup (){
            document.documentElement.setAttribute('data-dark','true')
            document.body.classList.add('darker')
        }
    })
</script>

<style scoped>
@media(prefers-color-scheme: dark){}
</style>
