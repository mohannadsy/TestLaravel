<template>
  <div>
    <div>
      <span
        class="default-pointer"
        @click="toggle"
        @dblclick="makeFolder"
        v-if="isFolder"
        >{{ isOpen ? "-" : "+" }}</span
      >
      <span
        :class="{ bold: isFolder }"
        class="pointer"
        @click="sendNodeType(item, id)"
        >{{ item.name }}</span
      >
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
        v-for="(childBranch, index) in item.branches"
        :key="index"
        :item="childBranch"
        @make-folder="$emit('make-folder', $event)"
        @node-type="this.$emit('node-type', $event)"
      ></tree-item>
      <tree-item
        v-for="(childUsers, index) in item.users"
        :key="index"
        :item="childUsers"
        @make-folder="$emit('make-folder', $event)"
        @node-type="this.$emit('node-type', $event)"
      ></tree-item>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "treeItem",
  props: {
    item: Array,
  },
  data() {
    return {
      isOpen: false,
      node: "",
      id: "",
      res: {},
    };
  },
  computed: {
    isFolder: function () {
      return this.item.branches && this.item.branches.length;
    },
  },
  methods: {
    toggle: function () {
      if (this.isFolder) {
        this.isOpen = !this.isOpen;
      }
    },
    makeFolder: function () {
      if (!this.isFolder) {
        this.$emit("make-folder", this.item);
        this.isOpen = true;
      }
    },

    sendNodeType(item) {
      if (item.hasOwnProperty("branches")) {
        this.node = "branches";
      } else {
        this.node = "users";
      }
    this.$emit("node-type",this.node);
    //   let res = this.$inertia.get(route("branch.show",1));
    let self = this;
    axios.get(route("branch.show",item.id)).then((response)=>{
   //this.res = response.data
           this.$emit("node-type",{node:this.node,response});
    }
            // I need this data here ^^


           //console.log(that)
)
    //   this.response = res;
    //   //this.response.code = res.code
    //console.log(this.res)


    },
  },
};
</script>
<style scoped>
.pointer {
  cursor: pointer;
}
.default-pointer {
  cursor: default;
}
ul {
  padding-left: 1em;
  line-height: 1.5em;
  list-style-type: none;
}
</style>
