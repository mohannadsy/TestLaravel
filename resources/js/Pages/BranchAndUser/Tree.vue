<template>
  <div>
    <div>
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
      <!-- class="[isActive  ? 'red' : 'blue']" -->
      <span
        class="pointer"
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
    //   isActive: 0,
    isNodeSelected : false
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

    sendNodeType(item, id) {
 this.isNodeSelected = true;
     this.isSelected = item.id;
     console.log(this.isSelected)
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

.selectedNode{
  background:#1a74b0;
  color:white;
}
.highlight {
     background-color: red;
}
.notselected {
  background-color:transparent;
}
.pointer {
  cursor: pointer;
}
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
.red {
  background: red;
}

.blue {
  background: blue;
}
</style>
