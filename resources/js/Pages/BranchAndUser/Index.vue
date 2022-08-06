Raghad, [8/6/2022 11:18 AM]
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
        :branchId="branchId"
        v-if="nodeType === 'branches'"
      ></branch-form>
      <user-form
        v-if="nodeType === 'users'"
        :branchInformaion="branchInformaion"
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
      branchId: "",
      userId: "",
      branchInformaion: {},
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    groupPermissions: Array,
    user: Array,
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
      if (nodeType === "branches") {
        this.branchId = nodeId;
      } else {
        this.userId = nodeId;
      }
      let res = await axios.get(route("branch.show", this.branchId));
      this.branchInformaion = JSON.parse(JSON.stringify(res.data));
        let result = await axios.get(route("user.show"),this.userId);
        console.log(JSON.parse(JSON.stringify(result.data)));
        console.lpg(this.user)
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
