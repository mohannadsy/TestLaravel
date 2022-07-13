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
        @click="action(event, item.id)"
        >{{ item.name }}</span
      >
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
        class="item"
        v-for="(childBranch, index) in item.branches"
        :key="index"
        :item="childBranch"
        @make-folder="$emit('make-folder', $event)"
      ></tree-item>
      <tree-item
        class="item"
        v-for="(childUsers, index) in item.users"
        :key="index"
        :item="childUsers"
        @make-folder="$emit('make-folder', $event)"
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
      current: 'sara current',
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
    // action(event, type) {
    //   if(this.current==='user'){
    //     this.$emit('send-user',this.current);
    //   }
    //   console.log("nodeType: ", type);
    // },
    showName: function (name) {
      this.current = name;
      console.log(this.current);
      this.$emit('send-current',this.current)
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
