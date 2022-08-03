<template>
    <navigation/>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import Welcome from "@/Jetstream/Welcome.vue"
import Navigation from "../Layouts/Navigation.vue";
export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    Navigation
  }
});
</script>
