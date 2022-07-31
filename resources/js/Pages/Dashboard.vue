<template>
  <app-layout title="Dashboard">
    <template #header>
    <language-selector></language-selector>
      <h2 class="h4 font-weight-bold">
         <!-- {{ __('Dashboard')}} -->
      </h2>
    </template>

    <welcome />
  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import Welcome from "@/Jetstream/Welcome.vue"
import LanguageSelector from "../Shared/LanguageSelector.vue";
export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    LanguageSelector
  }
});
</script>
