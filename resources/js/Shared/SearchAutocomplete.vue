<template>
  <div class="autocomplete">
     <!-- <fa icon="circle-minus" /> -->

    <element-input class="col"
      type="text"
      ref="input"
      v-model="query"
      @keydown.up="up"
      @keydown.down="down"
      @keydown.enter="selectItem"
    />
    <!-- <fa :icon="['fas', 'trash-can']" class="col-1" /> -->

    <ul class="options" ref="optionsList">
      <li
        v-for="(match, index) in matches"
        :key="index"
        :class="{ selected: selected == index }"
        @click="itemClicked(index, match)"
      >
        {{ match.code }} - {{ match.name }}
      </li>
    </ul>
  </div>
</template>
<script>
import ElementInput from "./ElementInput.vue";
export default {
  components: {
    ElementInput,
  },
  props: {
    items: {
      default: [],
      type: Array,
    },
    // filterby: {
    //   type: String,
    // },
    title: {
      default: "Select One...",
      type: String,
    },
    // shouldReset: {
    //   type: Boolean,
    //   default: true,
    // },
    value: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      itemHeight: 39,
      selectedItem: null,
      selected: 0,
      visible: false,
      query: "",
    };
  },
  watch:{
    value(){
        this.query = this.value;
    }
  },
  methods: {
    toggleVisible() {
      this.visible = !this.visible;
      setTimeout(() => {
        this.$refs.input.focus();
      }, 50);
    },
    itemClicked(index, match) {
      this.query = match.code + " - " + match.name;
      this.$emit("selected", match.id);
      this.visible = false;

      this.selected = index;

    //   this.selectItem();
    },
    selectItem() {
      this.selectedItem = this.matches[this.selected];
      let selectedObject = JSON.parse(JSON.stringify(this.selectedItem));
      this.query = selectedObject.code + " - " + selectedObject.name;
      this.$emit("selected", selectedObject.id);
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
    onChange(value) {
      this.$emit("input", value);
      console.log(value+"kkkk")
    //   this.matches();
    //   this.visible = true;
    },
  },
  computed: {
    matches() {
      this.$emit("change", this.query);
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
  position: absolute;
  max-height: 115px;
  overflow-y: scroll;
  /* margin-top: 5px; */
  list-style-type: none;
  text-align: left;
  padding-left: 0;
  left: 2px;
  right: 2px;
  padding-right: 0px;
  border-radius: 3px;
}
.options li {
  border-bottom: 1px solid lightgray;
  padding: 7px;
  cursor: pointer;
  background: #f1f1f1;
}
.options li:first-child {
  border-top: 2px solid #d6d6d6;
}
.options li:hover {
  /* background: #8c8c8c; */
  background: #5c5b5b;
  /* color: #fff; */
  /* background: #58bd4c; */
  color: #fff;
  font-weight: 600;

}
/* .options li.selected {
  background: #58bd4c;
  color: #fff;
  font-weight: 600;
} */
</style>
