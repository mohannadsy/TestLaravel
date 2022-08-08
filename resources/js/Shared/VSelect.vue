<template>
    <select class="form-select" v-model="selectedOption"  @input="event => { $emit('input', event.target.value) }" >
        <option  v-for="(option, i) in options" :key="i" :value="option">
            {{option}}
        </option>
    </select>
</template>

<script>
export default {
  props: {
    value: null,
    options: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      selectedOption: null
    }
  },
  mounted () {
    this.selectedOption = this.value
  },
  watch: {
    value(newValue) {
      this.selectedOption = newValue
    }
  }
}
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
