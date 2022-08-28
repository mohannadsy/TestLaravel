<template>
  <div class="autocomplete">
    <element-input
      class="input"
      type="text"
      ref="input"
      v-model="query"
      @keydown.up="up"
      @keydown.down="down"
      @keydown.enter="selectItem"
    />
     <ul class="options" ref="optionsList">
          <li
            v-for="(match, index) in matches"
            :key="index"
            :class="{ selected: selected == index }"
            @click="itemClicked(index,match)"
          >
            {{ match.code }} - {{ match.name }}
          </li>
        </ul>
  </div>
</template>
<script>
import ElementInput from './ElementInput.vue'
export default {
    components:{
        ElementInput
    },
  props: {
    items: {
      default: [],
      type: Array,
    },
    filterby: {
      type: String,
    },
    title: {
      default: "Select One...",
      type: String,
    },
    shouldReset: {
      type: Boolean,
      default: true,
    },
    query:{
      type:String,
      default:''
    }
  },
  data() {
    return {
      itemHeight: 39,
      selectedItem: null,
      selected: 0,
      visible: false,
    };
  },
  methods: {
    toggleVisible() {
      this.visible = !this.visible;
      setTimeout(() => {
        this.$refs.input.focus();
      }, 50);
    },
    itemClicked(index,match) {
      this.query = match.code + " - " + match.name;
      this.$emit("selected", this.query);
      this.visible = false;

       this.selected = index;

       this.selectItem();
    },
    selectItem() {
    this.selectedItem = this.matches[this.selected];
    let selectedObject = JSON.parse(JSON.stringify(this.selectedItem))
    this.query = selectedObject.code + " - " + selectedObject.name
    this.$emit("selected", this.query);
    },
    up() {
      if (this.selected == 0) {
        return;
      }
      this.selected -= 1;
      this.scrollToItem();
    },
    down() {
      if (this.selected >= this.matches.length - 1) {
        return;
      }
      this.selected += 1;
      this.scrollToItem();
    },
    scrollToItem() {
      this.$refs.optionsList.scrollTop = this.selected * this.itemHeight;
    },
  },
  computed: {
    matches() {
      if (this.query == "") {
        return [];
      }

      return this.items.filter(
        (item) =>
          item.name.toLowerCase().includes(this.query.toLowerCase()) ||
          item.code.toLowerCase().includes(this.query.toLowerCase())
      );
    },
  },
};
</script>

<style scoped>
.autocomplete {
  width: 100%;
  position: relative;
}
.input {
  height: 40px;
  border-radius: 3px;
  border: 2px solid lightgray;
  box-shadow: 0 0 10px #eceaea;
  font-size: 25px;
  padding-left: 10px;
  padding-top: 10px;
  cursor: text;
}
.close {
  position: absolute;
  right: 2px;
  top: 4px;
  background: none;
  border: none;
  font-size: 30px;
  color: lightgrey;
  cursor: pointer;
}
.placeholder {
  position: absolute;
  top: 11px;
  left: 11px;
  font-size: 25px;
  color: #d0d0d0;
  pointer-events: none;
}
.popover {
  min-height: 50px;
  border: 2px solid lightgray;
  position: absolute;
  top: 46px;
  left: 0;
  right: 0;
  background: #fff;
  border-radius: 3px;
  text-align: center;
}
.popover input {
  width: 95%;
  margin-top: 5px;
  height: 40px;
  font-size: 16px;
  border-radius: 3px;
  border: 1px solid lightgray;
  padding-left: 8px;
}
.options {
  max-height: 150px;
  overflow-y: scroll;
  margin-top: 5px;
}
.options {
  list-style-type: none;
  text-align: left;
  padding-left: 0;
}
.options  li {
  border-bottom: 1px solid lightgray;
  padding: 10px;
  cursor: pointer;
  background: #f1f1f1;
}
.options  li:first-child {
  border-top: 2px solid #d6d6d6;
}
.options  li:not(.selected):hover {
  background: #8c8c8c;
  color: #fff;
}
.options  li.selected {
  background: #58bd4c;
  color: #fff;
  font-weight: 600;
}
</style>
