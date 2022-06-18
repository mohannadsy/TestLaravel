<template>
    <div class="form-check">
        <input
            class="form-check-input"
            type="checkbox"
            :value="value"
            v-model="proxyChecked"
        />
        <label class="form-check-label">
            {{ label }}
        </label>
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
        label: {
            type: [String, Number],
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
  direction: rtl;
}
input {
    margin-left: 7px;
    cursor: pointer;
    
}
.form-check .form-check-input {
    float: right;
}
label{
  margin-right: 22px;
}
</style>
