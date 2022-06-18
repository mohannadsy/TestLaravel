<template>
    <div class="input-wrap">
        <label class="label">{{ label }}</label>
        <input type="text" :value="modalValue" @input="$emit('update:modalValue', $event.target.value)"
         ref="input" :placeholder="placeholder"  />
    </div>
</template>

<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: ["label", "modelValue","placeholder"],
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
    line-height: 36px;
    height: 36px;
    padding: 0 5px;
    border: none;
    // background: rgba(#000, 0.5);
    box-shadow: inset 0 -1px 0 rgba(#000, 0.9);
    border-radius: 3px 3px 0 0;
    width: 100%;
    }
    input:focus{
         background-color: #f8fafc;
         box-shadow: inset 0 -1px 0 rgba(#000, 0.9);
         border-radius: 3px 3px 0 0;
             border: 1px solid #ced4da;
        
    }
     &:focus + .label{
        font-size: 12px;
        top:-20px;
        font-weight: 600;
       
    }
    &:not(:placeholder-shown) + .label{
        top:-20;
        font-weight: 600;
        font-size: 12px;
    }
}
.label{
    font-size: 14px;
    left: 0;
    bottom: 0;
    pointer-events: none;
    padding: 5px;
    top:10px;
    color:#000;
}
</style>