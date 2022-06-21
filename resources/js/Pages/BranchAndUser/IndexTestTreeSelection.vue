<template>
    <div class="row">
        <div class="col-6">
            <tree id="customtree-selection"
        :initial-model="model"
        :model-defaults="modelDefaults"
        :selection-mode="normalizedSelectionMode"
        ref="treeSelection"></tree>

  <div id="app-selection" class="demo-tree">
    <label for="modeSelect">Selection Mode</label>
    <select v-model="selectionMode" id="modeSelect" style="margin-bottom: 2rem;">
      <option value="single">Single</option>
      <option value="selectionFollowsFocus">Selection Follows Focus</option>
      <option value="multiple">Multiple</option>
      <option value="">No Selection</option>
    </select>
    <tree-view id="customtree-selection" :initial-model="model" :model-defaults="modelDefaults" :selection-mode="normalizedSelectionMode" ref="treeSelection"></tree-view>
    <section id="selected-stuff">
      <button type="button" class="tree-processor-trigger" @click="refreshSelectedList">What's selected?</button>
      <ul id="selectedList">
        <li v-for="selectedNode in selectedNodes">{{ selectedNode.id }}</li>
      </ul>
    </section>
  </div>
        </div>
        <div class="col-6">
            <branch-form @save-data="saveData"></branch-form>
        </div>
    </div>
</template>

<script>
import BranchForm from '../../components/branches/BranchForm.vue';
import TreeView from "@grapoza/vue-tree";
export default {
    data() {
        return {
    
          model: [
            {
              id: 'node1',
              label: 'My First Node',
              children: [],
              treeNodeSpec: {
                input: {
                  type: 'checkbox',
                  name: 'checkbox1'
                }
              }
            },
            {
              id: 'node2',
              label: 'My Second Node',
              children: [
                {
                  id: 'subnode1',
                  label: 'This is a subnode',
                  children: [],
                  treeNodeSpec: {
                    title: 'Even non-input nodes should get a title.'
                  }
                },
                {
                  id: 'subnode2',
                  label: 'This is a checkable, checked subnode',
                  children: [
                    {
                      id: 'subsubnode1',
                      label: 'An even deeper node',
                      children: []
                    }
                  ],
                  treeNodeSpec: {
                    input: {
                      type: 'checkbox',
                      name: 'checkbox3'
                    }
                  }
                }
              ],
              treeNodeSpec: {
                title: 'My second node, and its fantastic title',
                input: {
                  type: 'checkbox',
                  name: 'checkbox2'
                },
                state: {
                  expanded: true
                }
              }
            }
          ],
          modelDefaults: {
            selectable: true,
            expanderTitle: 'Expand this node'
          },
          selectionMode: 'single',
          selectedNodes: []
            };
      },
      computed: {
        normalizedSelectionMode() {
          return this.selectionMode === '' ? null : this.selectionMode;
        }
      },
      methods: {
         saveData(data){
            this.$store.dispatch('branches/registerBranch',data);
        },
        refreshSelectedList() {
          this.selectedNodes = this.$refs.treeSelection.getSelected();
        }
      },
    props:{
        branches: Array
    },
    components:{
        BranchForm,TreeView
    }


}
</script>
