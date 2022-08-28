<template>
    <div class="row py-2">
        <div class="col-7 table-div ">
            <table>
                <tr>
                    <th colspan="2">المستودعات</th>
                </tr>
                <tr>
                    <td class="num">الرقم</td>
                    <td class="store">المستودع</td>
                </tr>
                <tr  v-for="(row, index) in rows" :key="index" :row="row">
                    <td>{{ ++index }}</td>
                    <td><element-input v-model="row.row"></element-input> </td>
                </tr>
            </table>
        </div>
        <div class="col-2">
            <element-button type='button' class="btn btn-info" @click="addRow">
            
            <fa icon="plus-circle" />
            </element-button>
            <element-button type='button' class="btn btn-info" @click="removeRow(i)">
                
                <fa icon="trash-can" />
            </element-button>

        </div>
        
    </div>
    
    
</template>

<script>
import ElementInput from '../../Shared/ElementInput.vue';
import ElementButton from '../../Shared/ElementButton.vue';
export default {
    components:{
       ElementInput,
       ElementButton
    },
    data() {
        return {
            numOfRows:[{storename:''}],
            // numOfRows:3,
            rows: [{row: ""}],
            // index:"4"
        };
    },
    methods:{
    // addRow: function(){
    //  this.numOfRows++;
    // },
    //  add: function() {      
    //    this.store.push({storename:'',})},
    addRow() {
    this.rows.push({
      row: []
    });
  },
  removeRow: function(index) {
    // console.log("Removing", index);
    this.rows.splice(index, 1);
  }
  }
};
</script>

<style scoped>
table {
    width: 100%;
    empty-cells: show;
}
tr .num {
    width: 20%;
}
tr .store {
    width: 80%;
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
.btn {
    padding: 5px 10px ;
    margin: 5px;
}
.row{
    overflow-y: scroll;
    /* overflow-x: scroll; */
    scroll-behavior: auto;
}
</style>
