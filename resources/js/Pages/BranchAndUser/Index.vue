<template>
  <div class="row">
    <div class="col-3">
      <tree
        v-for="branch in branchesWithUsers"
        :key="branch.name"
        class="item"
        :item="branch"
        @node-type="getNodeType($event)"
      ></tree>
    </div>
    <div class="col-9">
      <branch-form
      :branchInformaion="branchInformaion"
      :nodeId="nodeId"
      v-show="nodeType == 'branches'"
      ></branch-form>
      <user-form
        v-show="nodeType == 'users'"
        :groupPermissions="$page['props']['groupPermissions']"
      ></user-form>
    </div>
  </div>
</template>
<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
import axios from "axios";
export default {
  data() {
    return {
      nodeType: "branches",
      nodeId: "",
      branchInformaion: {},
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    groupPermissions: Array,
  },
  components: {
    userForm: Index,
    branchForm: IndexVue,
    Tree,
  },
  methods: {
    // saveData() {
    //   this.$store.dispatch("branches/loadBranches");
    // },
    async getNodeType({ nodeId, nodeType }) {
      this.nodeType = nodeType;
      this.nodeId = nodeId;
      let res = await axios.get(route("branch.show", this.nodeId));
      this.branchInformaion = JSON.parse(JSON.stringify(res.data));
    },
  },
};
</script>
<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>
