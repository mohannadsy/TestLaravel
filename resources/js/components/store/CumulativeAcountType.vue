<template>
    <div class="row py-2">
        <div class="col-7 table-div ">
            <table class="table table-striped">
                <tr>
                    <th colspan="2">{{$t("theStores")}}</th>
                </tr>
                <tr>
                    <td class="num">{{$t("numOfStore")}}</td>
                    <td class="store">{{$t("storeName")}}</td>
                </tr>
                <tr  v-for="(row, index) in rows" :key="index" :row="row" @click="selectRow(index-1)">
                    <td>{{ ++index }}</td>
                    <td><element-input v-model="row.row" @keydown.enter.prevent="addRow" ></element-input> </td>
                </tr>
            </table>
        </div>
        <div class="col-2">
            <!-- <element-button type='button' class="btn btn-info" @click="addRow">
            <fa icon="plus-circle" />
            </element-button> -->
            <element-button type='button' class="btn btn-info" @click="openModal">
                
                <fa icon="trash-can" />
            </element-button>
        </div>   
        <confirmed-delete v-show="show" :title="msg" @delete="removeRow(selectedRow)" @close="closeModal"></confirmed-delete>
    </div>
    
    
</template>

<script>
import ElementInput from '../../Shared/ElementInput.vue';
import ElementButton from '../../Shared/ElementButton.vue';
import confirmedDelete from '../../Shared/confirmedDelete.vue';
import ConfirmedDelete from '../../Shared/confirmedDelete.vue';
export default {
    components:{
    ElementInput,
    ElementButton,
    confirmedDelete,
    ConfirmedDelete
},
    data() {
        return {
            rows: [{id:"",row: ""}],
            selectedRow : 0,
            show:false,
            msg:"سيتم الحذف،هل أنت متأكد؟"
        };
    },
    methods:{
    addRow() {
       if(this.rows[this.rows.length-1].row != ""){
        this.rows.push({
            row: []
        });
       }
    
  },
  openModal(){
    this.show = true;
  },
  closeModal(){
    this.show = false;
  },
  selectRow(index){
    this.selectedRow = index
  },
  removeRow: function(index) {
    
        this.rows.splice(index, 1);
        this.show = false;
        if(this.rows.length == 0)
            this.addRow();
        
            console.log(this.rows.length)
        
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
