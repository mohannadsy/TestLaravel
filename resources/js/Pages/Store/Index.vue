<template>
  <div class="row">
    <div class="col-3">
      <warehouse-directory></warehouse-directory>
      <tree
        v-for="store in stores"
        :key="store.name"
        class="item"
        :item="store"
      ></tree>
    </div>
    <div class="col-9">
      <currency-index></currency-index>
    </div>
  </div>
</template>

<script>
import Tree from "./Tree.vue";
import Index from "../../components/store/Index.vue";
import WarehouseDirectory from "../../components/store/WarehouseDirectory.vue";
export default {
  components: {
    currencyIndex: Index,
    WarehouseDirectory,
    Tree
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
