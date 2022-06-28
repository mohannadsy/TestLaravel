<template>
   <table class="mt-2">
    <thead>
        <tr>
            <th></th>
            <th>إضافة</th>
            <th>تعديل</th>
            <th>حذف</th>
            <th>استعراض</th>
            <th>حذف نهائي</th>
            <th>استعادة</th>
            <th>طباعة</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>حسابات</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
         <tr>
            <td>دليل الحسابات</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> بطاقة حساب</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

   </table>
</template>


<script>
import ElementLabel from "../../Shared/ElemetLabel.vue";
import ElementCheckbox from "../../Shared/ElementCheckbox.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";

export default {
    components: {
    ElementLabel,
    ElementCheckbox,
    CheckboxSwitch

},

    data() {

    },
};

</script>

<style scoped>
table,th,td{
    border: 1px solid;

}

</style>
