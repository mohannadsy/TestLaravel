<template>
    <div class="log-div ">
        <h3  class="  px-3">
            <span v-if="value">{{ value }}</span>
            <span v-else><slot></slot></span>
        </h3>
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
    padding: 3px;
}
</style>