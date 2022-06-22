<template>
    <button :type="type" >
    <slot></slot>
  </button>
</template>



<script>
 import { defineComponent } from 'vue'

  export default defineComponent({
    props: {
      type: {
        type: String,
      },
    }
  })
</script>

<style scoped>
button {
  background-color: black;
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  /* font-size: 16px; */
}
</style>