<template>
<div>
    <!-- <ul v-for="(groupPermission, i) in groupPermissions" :key="i" >
      <elemet-label> {{groupPermission.caption}}</elemet-label>
      <li v-for="(permission,i) in groupPermission.permissions" :key="i">
                {{ permission}}
      </li>
    </ul> -->
     <ul >
      <elemet-label> raghad</elemet-label>
      <li >
            <elemet-label>hello</elemet-label>
      </li>
    </ul>
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
props:{
    groupPermissions:Array,
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
