<template>
    <div>
        <ul class="main" v-for="(groupPermission, i) in groupPermissions" :key="i" >
        <span class="rightAngle"></span>
            <elemet-label> {{groupPermission.caption}}</elemet-label>
            
            <ul class="permisiions_ul" >
                    <li class="col-3" v-for="(permission,i) in groupPermission.permissions" :key="i">
                        <checkbox-switch>   </checkbox-switch>
                        {{permission.caption }}
                    </li>

            </ul>
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
    props: {
        groupPermissions:Array,
    },
    mounted() {
    var toggleNodeGroup = document.getElementsByClassName("rightAngle");
    for (var i = 0; i < toggleNodeGroup.length; i++) {
      toggleNodeGroup[i].addEventListener("click", function () {
        this.parentElement
          .querySelector(".permisiions_ul")
          .classList.toggle("active");
        this.classList.toggle("angleDown");
      });
    }
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
.rightAngle::before {
  content: "\25B6";
  display: inline-block;
  cursor: pointer;
  padding: 1px;
  transition: 0.2s ease-out;
  transform: rotate(180deg);
}
.angleDown::before {
  transform: rotate(90deg);
  transition: 0.2s ease-out;
}


li
{
  float :right;
  display: block;
  padding: 20px 16px ;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>
