<template>
  <div>
    <div>
      <span
        class="default-pointer"
        @click="toggle"
        @dblclick="makeFolder"
        v-if="isFolder"
      >
        <fa v-if="isOpen" icon="circle-minus" />
        <fa v-else icon="circle-plus" />
      </span>
      <span class="pointer" @click="sendNodeId(item)"
        >{{ item.name }} - {{ item.code }}</span
      >
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
        v-for="(childStore, index) in item.stores"
        :key="index"
        :item="childStore"
        @make-folder="$emit('make-folder', $event)"
        @node-id="this.$emit('node-id', $event)"
      ></tree-item>
    </ul>
  </div>
</template>

<script>
export default {
  name: "treeItem",
  props: {
    item: Array,
  },
  data() {
    return {
      isOpen: false,
      nodeId: "",
    };
  },
  computed: {
    isFolder: function () {
      return this.item.stores && this.item.stores.length;
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
    sendNodeId(item) {
      this.nodeId = item.id;
      this.$emit("node-id", this.nodeId);
    },
  },
};
</script>
<style scoped>
.highlight {
  background-color: red;
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
</style>
