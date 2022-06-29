<template>
    <select class="form-select" @change="handleChange" v-model="selected">
        <option  v-for="(option, i) in options" :key="i" :value="option.value">
            {{ option }}
        </option>
    </select>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            default: () => [],
        },
        value:{
            default:""
        }

    },
    methods:{
        handleChange(e){
            console.log(e.target.value + "raghad");
        }
    }
};
</script>

<style>
.form-select{
    background: #fff;
    padding:6px 12px;
    margin:8px 0;
    display: inline-block;
    border:1px slid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.form-select:focus{
    outline: none;
}
.form-select--error{
    border:1px solid red;
}
</style>
