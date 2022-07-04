<template>
    <div class="row">
        <div class="col-3">
          <ul class="parent-tree">
        <li v-for="branch in branches" :key="branch.id">
            <span class="rightAngle"></span>
            <span class="ti ti-folder"></span>&nbsp;&nbsp;
            <span  @click="printTree(branch)">{{branch.name}}</span>
            <ul class="nested-tree" v-for="insideBranch in branch.branches" :key="insideBranch.id">
                <li><span class="ti ti-image"></span>&nbsp;&nbsp;<span @click="printTree(insideBranch)">{{insideBranch.name}}</span></li>
                <li v-for="user in insideBranch.users" :key="user.id"><span class="ti ti-File"></span>&nbsp;&nbsp;<span @click="getDataToForm(user , 'user')">{{user.name}}</span></li>
            </ul>

            <!-- <span class="rightAngle"></span>
            <span class="ti ti-folder"></span>&nbsp;&nbsp;Main Folder
            <ul class="nested-tree">
                <li><span class="ti ti-image"></span>&nbsp;&nbsp;Image File</li>
                <li><span class="ti ti-file"></span>&nbsp;&nbsp;Document File</li>
                <li>
                    <span class="rightAngle"></span>
                    <span class="ti ti-folder"></span>&nbsp;&nbsp;Sub Folder
                    <ul class="nested-tree">
                        <li><span class="ti ti-image"></span>&nbsp;&nbsp;Image File</li>
                        <li><span class="ti ti-file"></span>&nbsp;&nbsp;Document File</li>
                        <li>
                            <span class="rightAngle"></span>
                            <span class="ti ti-folder"></span>&nbsp;&nbsp;Sub Folder
                            <ul class="nested-tree">
                                <li><span class="ti ti-image"></span>&nbsp;&nbsp;Image File</li>
                                <li><span class="ti ti-file"></span>&nbsp;&nbsp;Document File</li>
                                <li><span class="ti ti-image"></span>&nbsp;&nbsp;Image File</li>
                                <li><span class="ti ti-file"></span>&nbsp;&nbsp;Document File</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul> -->
        </li>
    </ul>
        </div>
        <div class="col">
            <index @save-data="saveData"></index>
        </div>
        <div>
        <button @click="printBranch">printBranch</button>
        <ul>
            <li v-for="branch in branchesWithUsers" :key="branch.id">{{branch.name}}</li>
        </ul>
        </div>
    </div>
</template>

<script>
import Index from '../../components/branches/Index.vue';
import {Inertia} from "@inertiajs/inertia";
export default {
    data() {
        return {
            };
      },
      computed: {
      },
      mounted() {
        var toggleNodeTree = document.getElementsByClassName('rightAngle');
        for (var i = 0; i < toggleNodeTree.length; i++) {
            toggleNodeTree[i].addEventListener('click', function() {
                this.parentElement.querySelector('.nested-tree').classList.toggle('active');
                this.classList.toggle('angleDown')

            })
        }
      },
      methods: {
        printBranch(){
             console.log(branchesWithUsers);
        },
        saveData(data){
          this.$store.dispatch('branches/registerBranch',data);
        },
        getDataToForm(data , dataType){
          console.log(data.name + "," + dataType);
        },
        printTree(object){

            for (var key in object) {
                if(typeof object[key] === "object"){
                    this.printTree(object[key]);
                    if(key == "users"){
                        console.log(object.name + "  : " + typeof object[key] + "; key : " + key);
                    }
                    if(key == 'permissions')
                        console.log(object.name + "  : " + typeof object[key] + "; key : " + key);
                }
            }
        }
      },
    props:{
        branches: Array,
        branchesWithUsers:Array
    },
    components:{
        Index
    },


}
</script>
<style>
.parent-tree {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.parent-tree * {
    margin: 0;
    padding: 0;
}

.rightAngle::before {
    content: "\25B6";
    display: inline-block;
    cursor: pointer;
    padding: 1px;
    transition: 0.2s ease-out;
    transform: rotate(180deg);
}

.parent-tree ul {
    list-style-type: none;
}

.nested-tree {
    padding-right: 40px;
    display: none;
}

.nested-tree.active {
    display: block;
}

.angleDown::before {
    transform: rotate(90deg);
    transition: 0.2s ease-out;
}
</style>
