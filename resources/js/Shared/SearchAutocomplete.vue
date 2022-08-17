<template>
  <div class="autocomplete">
    <element-input
      v-model="search"
      @input="onChange"
      @keydown.down="onArrowDown"
      @keydown.up="onArrowUp"
      @keydown.enter="onEnter"
      type="text"
    />
    <ul v-show="isOpen" class="autocomplete-results">
      <li v-if="isLoading" class="loading">Loading results...</li>
      <li
        v-else
        v-for="(result, index) in results"
        :key="index"
        @click="setResult(result)"
        class="autocomplete-result"
          :class="{ 'selected': (selected == index)}"
      >
        {{ result.code }} - {{ result.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import ElementInput from './ElementInput.vue';
export default {
    components:{
        ElementInput
    },
  props: {
    items: {
      type: Array,
      required: false,
      default: () => [],
    },
    isAsync: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
  data() {
    return {
      search: "",
      results: [],
      isOpen: false,
      selected: 0,
      arrowCounter: -1,
      itemValue:1
    };
  },
  watch: {
    items(value) {
      if (this.isAsync) {
        this.results = value;
        this.isOpen = true;
        this.isLoading = false;
      }
    },
  },
  mounted() {
    document.addEventListener("click", this.handleClickOutside);
  },
  unmounted() {
    document.removeEventListener("click", this.handleClickOutside);
  },
  methods: {
    handleClickOutside(event) {
      if (!this.$el.contains(event.target)) {
        this.arrowCounter = -1;
        this.isOpen = false;
      }
    },
    onArrowDown() {
      if (this.arrowCounter < this.results.length) {
        this.arrowCounter = this.arrowCounter + 1;
      }
    },
    onArrowUp() {
      if (this.arrowCounter > 0) {
        this.arrowCounter = this.arrowCounter - 1;
      }
    },
    onEnter() {
      this.search = this.results[this.arrowCounter];
      this.arrowCounter = -1;
      this.isOpen = false;
    },
    setResult(result) {
      this.search = result.code + " - " + result.name
        this.itemValue = result.id;
        this.$emit('item-value',this.itemValue)
      this.isOpen = false;
    },
       filterResults() {
      this.results = this.items.filter(
        (item) =>
          item.name.toLowerCase().includes(this.search.toLowerCase()) ||
          item.code.toLowerCase().includes(this.search.toLowerCase())
      );
    },
    onChange() {
      this.$emit("input", this.search);

      if (this.isAsync) {
        this.isLoading = true;
      } else {
        this.filterResults();
        this.isOpen = true;
      }
    },
  },
};
</script>

<style scoped>

.autocomplete {
  position: relative;
}

.autocomplete-results {
  text-align: center;
  list-style-type: none;
  padding: 0;
  margin: 0;
  border: 1px solid #eeeeee;
  height: 120px;
  min-height: 1em;
  max-height: 6em;
  overflow: auto;
}

.autocomplete-result {
  list-style: none;
  text-align: center;
  padding: 4px 2px;
  cursor: pointer;
  background: #f1f1f1;
  border-bottom: 1px solid lightgray;
}

.autocomplete-result:not(.selected):hover {
 background: #8c8c8c;
    color: #fff;
}
.autocomplete-result.selected {
    background: #58bd4c;
    color: #fff;
    font-weight: 600;
}
</style>
