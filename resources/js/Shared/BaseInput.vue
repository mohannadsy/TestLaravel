<template>
    <div class="Input-Wrapper">
        <input :type="type" class="setStyle" name="Input" placeholder="" />
        <label for="Input" class="label"> <slot></slot> </label>
    </div>
</template>
<script>
export default {
    name: "baseInputFeild",
    props: {
        // type: {
        //     type: string,
        //     default: "text",
        // },
        // variant: {
        //     type: string,
        //     default: "input--green",
        // },
    },
    computed: {
        setStyle() {
            if (this.style) {
                return `Input $(this.style)`;
            } else {
                return "input";
            }
        },
    },
};
</script>

<style lang="scss" scoped>
.input {
    font-size: 16px;
    line-height: 36px;
    height: 36px;
    padding: 0 5px;
    border: none;
    background: rgba(#000, 0.5);
    box-shadow: inset 0 -1px 0 rgba(#000, 0.3);
    border-radius: 3px 3px 0 0;
    width: 100%;

    &-Wrapper {
        position: relative;
        display: flex;
    }
    &-hover {
        background: rgba(#000, 0.04);
        box-shadow: inset 0 -1px 0 rgba(#000, 0.5);
    }
    &--green:focus{
        box-shadow: inset 0 -2px 0 palegreen;
    }
     &--pink:focus{
        box-shadow: inset 0 -2px 0 palevioletred;
    }
     &--black:focus{
        box-shadow: inset 0 -2px 0 #000;
    }
    &:focus{
        outline: none;
        background: rgba(#000,0.05);
        border-radius: 3px 3px 2px 2px;
    }
    &:focus + .label{
        font-size: 12px;
        top:-20px;
        font-weight: 600;
    }
    &--pink:focus + .label{
        color: palevioletred;
    }
     &--green:focus + .label{
        color: palegreen;
    }
     &--black:focus + .label{
        color: black;
    }
    &:not(:placeholder-shown) + .label{
        top:-20;
        font-weight: 600;
        font-size: 12px;
    }

}
.label{
    font-size: 14px;
    position: absolute;
    left: 0;
    bottom: 0;
    pointer-events: none;
    padding: 5px;
    top:10px;
    color:rgba(#000, 0.5);
}
</style>
