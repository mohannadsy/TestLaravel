<template>

    <div class="form-check form-switch">
        <input
            type="checkbox"
            role="switch"
            :value="value"
            v-model="proxyChecked"
            class="form-check-input"
        />
        <label class="form-check-label">{{label}}</label>
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
        label:{
            type: [String, Number],
        }
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
.form-check .form-check-input {
    float: right;
}
.form-check-input {
    cursor: pointer;
    margin-left: 7px;
}
</style>