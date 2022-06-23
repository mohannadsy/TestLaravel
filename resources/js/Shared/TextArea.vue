<template>
    <textarea
        rows="4"
        cols="15"
        class="form-control"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    >
    </textarea>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["modelValue"],
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
<style>
textarea{
    resize: none;
    scroll-behavior: auto;
}

</style>
