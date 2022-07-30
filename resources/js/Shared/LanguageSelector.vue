<template>
    <div class="ml-4">
        <inertia-link :href="route('language', [selectable_locale])">
            <icon class="w-5 h-5" :name="selectable_locale" />
        </inertia-link>
    </div>
</template>

<script>
    export default {
        name: "LanguageSelector"
    }
</script>

<style scoped>

</style>
