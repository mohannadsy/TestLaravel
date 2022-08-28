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
            <tr v-for="row in rows">
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="button" @click="removeRow(row)">delete</button></td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rows:[],
        };
    },
    methods:{
    addRow: function(){
      this.rows.push({});
    },
    removeRow: function(row){
      //console.log(row);
      this.rows.$remove(row);
    }
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
