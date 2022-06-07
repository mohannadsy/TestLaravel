<template>
    <div id="app-custom-gray" class="demo-tree">
        <tree id="customtree-gray" :initial-model="model" :model-defaults="modelDefaults" ></tree>
    </div>
</template>

  <script type='module'>
  import TreeView from "@grapoza/vue-tree"
 export default {
      components: {
        tree: TreeView
      },
    data() {
        return {
          childCounter: 0,
          model: [
            {
              id: 'rootNode',
              label: 'الفرع الرئيسي',
              children: [
                {
                  id: 'subNode',
                  label: 'جبلة'
                }
              ]
            }
          ],
          modelDefaults: {
            draggable: true,
            allowDrop: true,
            addChildCallback: this.addChildCallback,
            addChildTitle: 'Add a new child node',
            deleteTitle: 'Delete this node',
            expanderTitle: 'Expand this node',
            customizations: {
              classes: {
                treeViewNodeSelfExpander: 'action-button',
                treeViewNodeSelfExpandedIndicator: 'fas fa-chevron-right',
                treeViewNodeSelfAction: 'action-button',
                treeViewNodeSelfAddChildIcon: 'fas fa-plus-circle',
                treeViewNodeSelfDeleteIcon: 'fas fa-minus-circle'
              }
            }
          }
        };
      },
      methods: {
        addChildCallback() {
          this.childCounter++;
          return Promise.resolve({ id: `child-node${this.childCounter}`, label: `الفرع ${this.childCounter}`, treeNodeSpec: { deletable: true } });
        }
      }

 }
  </script>
