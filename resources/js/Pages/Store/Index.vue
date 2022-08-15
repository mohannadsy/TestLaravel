<template>
  <div class="row">
    <div class="col-3">
      <warehouse-directory></warehouse-directory>
      <tree
        v-for="store in stores"
        :key="store.name"
        class="item"
        :item="store"
        @node-id="getNodeId($event)"
      ></tree>
    </div>
    <div class="col-9">
      <store-index :storeInformation="storeInformation"></store-index>
    </div>
  </div>
</template>

<script>
import Tree from "./Tree.vue";
import Index from "../../components/store/Index.vue";
import WarehouseDirectory from "../../components/store/WarehouseDirectory.vue";
import axios from "axios";
export default {
  components: {
    storeIndex: Index,
    WarehouseDirectory,
    Tree,
  },
  data() {
    return {
      nodeId: "",
      storeInformation: {},
    };
  },
  props: {
    stores: Array,
  },
  methods: {
    async getNodeId(nodeId) {
      this.nodeId = nodeId;
      let res = await axios.get(route("store.show", this.nodeId));
      this.storeInformation = JSON.parse(JSON.stringify(res.data));
    },
  },
};
</script>
<style scoped>
.a {
  border-left-style: solid;
}
</style>
