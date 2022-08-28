<template>
    <div class="py-2">
        <table>
            <tr>
                <th colspan="2">المستودعات</th>
            </tr>
            <tr>
                <td class="num">الرقم</td>
                <td class="store">المستودع</td>
            </tr>
            <tr v-for="(numOfRow,i) in numOfRows" :key="i">
                <td>{{ ++i }}</td>
                <td><element-input v-model="numOfRow.storename"></element-input> </td>
            </tr>
        </table>
            <button type='button' class="btn btn-info" @click="addRow">
                <fa icon="plus-circle" />
                    Add
            </button>
              <button type='button' class="btn btn-info" @click="deleteRow(i, numOfRow)">
                
                    delete
            </button>
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
            numOfRows:[{storename:''}],
            numOfRows:3,
           newNumOfRows:'',
        };
    },
    methods:{
    addRow: function(){
    //   newNumOfRows= this.numOfRows++;
    //   numOfRows = newNumOfRows;
     this.numOfRows++;

    },
    deleteRow (index , store){
          var idx = this.numOfRows.indexOf(numOfRow);
            console.log(idx, index);
            if (idx > -1) {
                this.store.splice(idx, 1);
            }
    },
     add: function() {      
       this.store.push({storename:'',})}
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
