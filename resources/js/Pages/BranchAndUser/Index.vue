<template>
  <div class="row">
    <div class="col-3">
      <!-- <tree :branchesWithUsers="$page['props']['branchesWithUsers']"></tree> -->
      <tree
        v-for="branch in branchesWithUsers"
        :key="branch.name"
        class="item"
        :item="branch"
      ></tree>
      <!-- <tree
        id="customtree-basic"
        :initial-model="branchesWithUsers"
        :model-defaults="modelDefaults"
      ></tree> -->
    </div>
    <div class="col-9">
      <branch-form
        v-if="this.current === 'branch'"
        @send-branch="switchToBranch"
      ></branch-form>
      <user-form
        v-if="this.current === 'user'"
        @send-user="switchToUser"
      ></user-form>
    </div>
  </div>
</template>

<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
//import TreeView from "@grapoza/vue-tree";
export default {
  data() {
    return {
      current: "branch",
      modelDefaults: {
        idProperty: "id",
        labelProperty: "name",
        childrenProperty: "branches",
      },
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
    //tree: TreeView,
  },
  methods: {
    saveData() {
      this.$store.dispatch("branches/loadBranches");
    },
    switchToUser() {
      this.current = "user";
    },
    switchToBranch() {
      this.current = "branch";
    },
  },
  mounted() {
    console.log(typeof(this.modelDefaults.childrenProperty));
  },
};
</script>
