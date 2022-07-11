<template>
  <li>
    <div :class="{ bold: isFolder }" @click="toggle" @dblclick="makeFolder">
      <span v-if="isFolder">{{ isOpen ? "-" : "+" }}</span> {{ item.name }}
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
        class="item"
        v-for="(child, index) in item.children"
        :key="index"
        :item="child"
        @make-folder="$emit('make-folder', $event)"
        @add-item="$emit('add-item', $event)"
      ></tree-item>
      <!-- <li class="add" @click="$emit('add-item', item)">+</li> -->
    </ul>
  </li>
</template>

<script>
export default {
  props: {
    item: Object,
  },
  data() {
    return {
      isOpen: false,
    };
  },
  computed: {
    isFolder: function () {
      return this.item.children && this.item.children.length;
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
  },
};
</script>

 <style>
        body {
            font-family: Menlo, Consolas, monospace;
            color: #444;
            direction: rtl;
        }

        .item {
            cursor: pointer;
        }

        .bold {
            font-weight: bold;
        }

        ul {
            padding-left: 1em;
            line-height: 1.5em;
            list-style-type: none;
        }
    </style>
