<template>
    <div>{{sara}}</div>
    <div>
        <!-- <div v-for="result in results" :key="result.id">
            {{result}}
        </div> -->
        <!-- {{loadResult}} -->
    </div>
    <!-- <div>{{freshData()}}</div> -->
    <div>
        <test-muhannad-sara></test-muhannad-sara>
    </div>
    <button @click="updateBranch">Click</button>
</template>

<script>
 import TestMuhannadSara from './TestMuhannadSara';
 export default {
        data() {
            return {
                sara : this.$store.state.branches.results
            }
        },
        props :{
            results : Array,
        },
        // watch:{
        //     loadResult(){
        //         this.$store.commit('branches/setResults' , 'hello walak');
        //         return this.$store.state.branches.results;
        //     }
        // },
        computed :{

        },
        components :{
            TestMuhannadSara
        },
        mounted(){},
        methods:{
            updateBranch(){
                this.$store.commit('branches/setResults' , 'hello walak again');
                console.log(this.$store.state.branches.results);
            },
            freshData(){
                this.sara = 'Sara again';
                // return this.$store.state.branches.results;
            }
        }
    }
</script>
