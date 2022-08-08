Raghad, [8/6/2022 11:18 AM]
<template>
  <div class="row">
    <div class="col-3">
       <add-section></add-section>
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
        :userPermissions="userPermissions"
        :userInformation="userInformation"
        :userId="userId"
        :groupPermissions="$page['props']['groupPermissions']"
      ></user-form>
    </div>
  </div>
</template>
<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
import addSection from "./addSection.vue";
import axios from "axios";
export default {
  data() {
    return {
      nodeType: "branches",
      branchId: "",
      userId: "",
      branchInformaion: {},
      userInformation: {},
      userPermissions: [],
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    groupPermissions: Array,
    user: Object,
  },
  components: {
    userForm: Index,
    branchForm: IndexVue,
    Tree,
    addSection,
  },
  methods: {
    // saveData() {
    //   this.$store.dispatch("branches/loadBranches");
    // },

    async getNodeType({ nodeId, nodeType }) {
      this.nodeType = nodeType;
      if (nodeType === "branches") {
        this.branchId = nodeId;
        let res = await axios.get(route("branch.show", this.branchId));
        this.branchInformaion = JSON.parse(JSON.stringify(res.data));
        console.log(this.branchInformaion);
      } else {
        this.userId = nodeId;
        console.log(this.userId);
        let result1 = await axios.get(route("user.showUser", this.userId));
        this.userInformation = JSON.parse(JSON.stringify(result1.data));
         let result = await axios.get(route("user.showUserPermissions", this.userId));
        this.userPermissions = JSON.parse(JSON.stringify(result.data));
        console.log(this.userInformation);
      }
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
