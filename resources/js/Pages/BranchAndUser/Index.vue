Raghad, [8/6/2022 11:18 AM]
<template>
  <div class="row">
    <div class="col-3">
      <add-section :branches="branches"></add-section>
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
        :branchNameWithCode="branchNameWithCode"
        :branchId="branchId"
        :branches="branches"
        v-if="nodeType === 'branches'"
      ></branch-form>
      <user-form
        v-if="nodeType === 'users'"
        :userPermissions="userPermissions"
        :userInformation="userInformation"
        :userId="userId"
        :roleOptions="roleOptions"
        :roleArray="roleArray"
        @send-roleId="getRoleId($event)"
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
import MyLayout from "../../Layouts/MyLayout.vue";
export default {
  data() {
    return {
      nodeType: "branches",
      branchId: "",
      userId: "",
      branchInformaion: {},
      userInformation: {},
      userPermissions: [],
      roleArray: {},
      roleOptions: [],
      roleId:2,
      branchNameWithCode:''
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    user: Object,
  },
  components: {
    userForm: Index,
    branchForm: IndexVue,
    Tree,
    addSection,
  },
  layout: MyLayout,
  async created() {
    let res = await axios.get(route("user.getRoles"));
    this.roleArray = JSON.parse(JSON.stringify(res.data));
    var finalArray = this.roleArray.map((obj) => obj.name);
    this.roleOptions = finalArray;
  },
  methods: {
    getRoleId(data){
        this.roleId = data
    },
    async getNodeType({ nodeId, nodeType }) {
      this.nodeType = nodeType;
      if (nodeType === "branches") {
        this.branchId = nodeId;
        let branchInformaion = await axios.get(route("branch.show", this.branchId));
        this.branchInformaion = JSON.parse(JSON.stringify(branchInformaion.data));
        let branchNameWithCode = await axios.get(route("user.branchParent",this.branchId))
        this.branchNameWithCode = JSON.parse(JSON.stringify(branchNameWithCode.data))
      } else {
        this.userId = nodeId;
        let result1 = await axios.get(route("user.showUser", this.userId));
        this.userInformation = JSON.parse(JSON.stringify(result1.data));
        let result = await axios.get(
          route("user.showUserPermissions", this.userId)
        );
        this.userPermissions = JSON.parse(JSON.stringify(result.data));
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
