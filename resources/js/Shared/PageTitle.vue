<template>
    <div class="log-div ">
        <h1  class="  px-3">
            <span v-if="value">{{ value }}</span>
            <span v-else><slot></slot></span>
        </h1>
    </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: ["value"],
});
</script>
<style scoped>
.log-div{
    color: white;
    background-color: black;
    font-weight: bold;
}
</style>