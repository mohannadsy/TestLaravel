<template>
    <div class="py-2">
        <table>
            <tr>
                <!-- <th colspan="2"></th> -->
                <th colspan="2">المستودعات</th>
            </tr>
            <tr>
                <td class="num">الرقم</td>
                <td class="store">المستودع</td>
            </tr>
            <tr v-for="(store,i) in numOfRows" :key="i">
                <td>{{ i++ }}</td>
                <td><element-input v-model="store.storename"></element-input> </td>
            </tr>
            <!-- <tr>
                <td></td>
                <td><button type="button" @click="removeRow(row)">delete</button></td>
            </tr> -->
        </table>
        <button @click="addRow">add row</button>
    </div>
</template>

<script>
import ElementInput from '../../Shared/ElementInput.vue';
export default {
    components:{
       ElementInput 
    },
    data() {
        return {
            store:[{storename:''}],
            numOfRows:3,
           newNumOfRows:'',
        };
    },
    methods:{
    addRow: function(){
    //   this.rows.push({});
      newNumOfRows= this.numOfRows++,
      numOfRows = newNumOfRows
        // newNumOfRows = this.numOfRows++;


    },
     addRow: function() {      
       this.users.push({storename:'',})}
    // removeRow: function(row){
    //   //console.log(row);
    //   this.rows.$remove(row);
    // }
  }
};
</script>

<style scoped>
table {
    width: 90%;
    empty-cells: show;
}
tr .num {
    width: 25%;
}
tr .store {
    width: 75%;
}
th {
    text-align: center;
    padding: 7px;
}
table,
td {
    border: 1px solid black;
    padding: 5px;
}
</style>
