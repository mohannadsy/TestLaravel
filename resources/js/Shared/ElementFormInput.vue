<template>
    <div class="input-wrap">
        <label for="">{{ label }}</label>
        <input
            type="text"
            :value="modalValue"
            @input="$emit('update:modalValue', $event.target.value)"
            ref="input"
        />
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["label", "modelValue"],

    emits: ["update:modelValue"],

    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
<style lang="scss" scoped>
.input-wrap {
    display: flex;
    flex-direction: column;

    input {
        padding: 8px 12px;
        font-size: 16px;
    }
}
</style>
