<template>
    <div class="form-check form-switch">
        <input
            type="checkbox"
            role="switch"
            :value="value"
            v-model="proxyChecked"
            class="form-check-input"
        />
    </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
    emits: ["update:checked"],
    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },
    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },
            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
});
</script>
<style scoped>
.form-check{
    /* display: inline-block; */
    float: right;
    margin-left: 8px;
    
}
input {
    cursor: pointer;
    margin-top: 0.3em;
}
</style>