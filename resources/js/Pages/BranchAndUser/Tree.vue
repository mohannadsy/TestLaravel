<template>
  <div>
    <div  tabindex="1"
        class="folderTitleSpan">
      <span
        class="default-pointer"
        @click="toggle"
        @dblclick="makeFolder"
        v-if="isFolder"
      >
        <!-- <fa v-if="isOpen" icon="caret-down" />
        <fa v-else icon="caret-left" /> -->

        <fa v-if="isOpen" icon="circle-minus" />
        <fa v-else icon="circle-plus" />
      </span>
      <span
        @click="sendNodeType(item, item.id)"
        >{{ item.name }} - {{ item.code }}</span
      >
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
        class="branches"
        v-for="(childBranch, index) in item.branches"
        :key="index"
        :item="childBranch"
        @make-folder="$emit('make-folder', $event)"
        @node-type="this.$emit('node-type', $event)"
      ></tree-item>
      <tree-item
        class="users"
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
import axios from "axios";
export default {
  name: "treeItem",
  props: {
    item: Array,
  },
  data() {
    return {
      isOpen: false,
      nodeType: "",
      nodeId: "",
      selectedNode: [],
    };
  },
  computed: {
    isFolder: function () {
      return this.item.branches && this.item.branches.length;
    },
    // setChevronClass: function () {
    //   return {
    //     opened: this.isFolder && this.open,
    //     closed: this.isFolder && !this.open,
    //     folderChevronSpan: this.isFolder,
    //   };
    // },
    // setSelected: function () {
    //   if (
    //     this.selectedNode.length > 0 &&
    //     this.selectedNode[0].title == this.item.name
    //   )
    //     return true;
    //   else return false;
    // },
  },
  methods: {
    toggle: function () {
      if (this.isFolder) {
        this.isOpen = !this.isOpen;
        this.$refs.toggler.focus();
      }
    },
    // changeType: function () {
    //   if (!this.isFolder) {
    //     Vue.set(this.item, "children", []);
    //     this.addChild();
    //     this.open = true;
    //   }
    // },
    // addChild: function () {
    //   this.item.children.push({
    //     name: "new stuff",
    //   });
    // },
    makeFolder: function () {
      if (!this.isFolder) {
        this.$emit("make-folder", this.item);
        this.isOpen = true;
      }
    },
    // selectNode: function () {
    //   this.selectedNode = [];
    //   this.selectedNode.push({
    //     title: this.item.name,
    //     isSelected: true,
    //   });
    // },
    sendNodeType(item, id) {
      //   this.selectedNode = [];
      //   this.selectedNode.push({
      //     title: this.item.name,
      //     isSelected: true,
      //   });
      id = item.id;
      if (item.hasOwnProperty("branches")) {
        this.nodeType = "branches";
        this.nodeId = id;
      } else {
        this.nodeType = "users";
        this.nodeId = id;
      }
      this.$emit("node-type", { nodeId: this.nodeId, nodeType: this.nodeType });
    },
  },
};
</script>
<style scoped>
.default-pointer {
  cursor: pointer;
  font-size: 20px;
  margin: 0px 3px;
  padding-bottom: 20px;
}
.branches {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.folderTitleSpan:hover {
  font-weight: bold;
    width:100%;
  border: 1px solid black;
  cursor: pointer;
}

.folderTitleSpan:focus,
 span:nth-child(1):focus + .folderTitleSpan {
  background-color: black;
  color: white;
  cursor: pointer;
   width:100%;
}
</style>
