<template>
  <div class="row">
    <div class="col-3">
      <warehouse-directory></warehouse-directory>
    </div>
    <div class="col-9">
      <currency-index></currency-index>
    </div>
  </div>
</template>

<script>
import Index from "../../components/store/Index.vue";
import WarehouseDirectory from "../../components/store/WarehouseDirectory.vue";
export default {
  components: {
    currencyIndex: Index,
    WarehouseDirectory,
  },
  props:{
    stores:Array
  }
};
</script>
<style scoped>
.a {
  border-left-style: solid;
}
</style>
