<template>
    <div>
        <ul class="main" v-for="(groupPermission, i) in groupPermissions" :key="i" >
            <elemet-label> {{groupPermission.caption}}</elemet-label>
            
            <ul >
                    <li class="col-3" v-for="(permission,i) in groupPermission.permissions" :key="i">
                        <checkbox-switch>   </checkbox-switch>
                        {{permission.caption }}
                    </li>

            </ul>
        </ul>
        <!-- <ul class="main" v-for="(group,i) in groups" :key="i" >
            <elemet-label> حسابات</elemet-label>
            <ul>
                <elemet-label>{{group}} </elemet-label>
                <li class="col-3" v-for="(permission,i) in permissions" :key="i">
                <checkbox-switch>   </checkbox-switch>
                {{permission}}
               </li>
            </ul>
        </ul> -->
    </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementCheckbox from "../../Shared/ElementCheckbox.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";

export default {
    components: {
        ElemetLabel,
        ElementCheckbox,
        CheckboxSwitch,
    },
    props: {
        groupPermissions:Array,
    },

    data() {
        return {
            // groups:['دليل الحسابات','بطاقة حساب'],
            // permissions:['إضافة بطاقة حساب','تعديل بطاقة ','حذف','استعراض','حذف نهائي','استعادة','طباعة']

        };
    },
};
</script>

<style scoped>
.main{
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}


li
{
  float :right;
  display: block;
  text-align: center;
  padding: 20px 16px ;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>
