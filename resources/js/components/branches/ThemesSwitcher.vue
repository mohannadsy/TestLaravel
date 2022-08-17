<!--<template>-->
<!--    <div ref="switchRef" @click="switchEvent">-->
<!--        <div v-if="darkMode">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill none:event " viewBox=" 0  0 16 16">-->
<!--                <path/>-->
<!--                <path></path>-->
<!--            </svg>-->
<!--        </div>-->
<!--        <div v-else>-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun-fill none:event" viewBox=" 0 0 16 16">-->
<!--                <path/>-->
<!--            </svg>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<script lang="ts">-->
<!--    import { defineComponent, ref, nextTick } from 'vue'-->

<!--    export default defineComponent({-->
<!--        name: 'DarkMode' ,-->
<!--        setup (){-->
<!--            const darkMode = ref<boolean>(false)-->
<!--            const switchRef = ref<any>(null)-->
<!--            const switchMode = ref<boolean>(false)-->

<!--            if(localStorage.getItem('preferredDarkMode') && localStorage.getItem('preferredDarkMode') === 'true'){-->
<!--              nextTick(() => {-->
<!--                  switchMode.value = true-->
<!--                  switchToggle()-->
<!--              })-->
<!--            }-->
<!--            else {-->
<!--                if (window.matchMedia && window.matchMedia("(prefers-color-schema: dark)").matches) {-->
<!--                    nextTick(() => {-->
<!--                        switchMode.value = true-->
<!--                        switchToggle()-->
<!--                    })-->
<!--                }-->
<!--            }-->
<!--            const darkAttrs = () => {-->
<!--                if(darkMode.value){-->
<!--                    document.documentElement.setAttribute('data-mode','dark')-->
<!--                    document.body.classList.add('darker')-->
<!--                    localStorage.setItem('preferredDarkMode','true')-->
<!--                }-->
<!--                else{-->
<!--                    document.documentElement.removeAttribute('data-mode')-->
<!--                    localStorage.setItem('preferredDarkMode','false')-->
<!--                }-->
<!--            }-->
<!--            const switchToggle = () => {-->
<!--                if(switchMode.value){-->
<!--                    darkMode.value = true-->
<!--                    darkAttrs()-->
<!--                    switchMode.value = false-->
<!--                } else {-->
<!--                    darkMode.value = false-->
<!--                    darkAttrs()-->
<!--                    switchMode.value = true-->
<!--                }-->
<!--            }-->
<!--            const switchEvent = () => {-->
<!--                nextTick(() => {-->
<!--                    switchToggle()-->
<!--                })-->
<!--            }-->
<!--            return {-->
<!--                switchRef ,-->
<!--                switchEvent ,-->
<!--                darkMode-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--    )-->

<!--</script >-->





<!--<template>-->
<!--    <div :class=" theme === 'light' ? 'light-theme' : 'dark-theme'" class="main-body">-->
<!--        <div style="padding: 5px">-->
<!--            <div> Theme selection in vue 3</div>-->
<!--            <button @click="changeTheme">Switch Theme</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->


<!--<script>-->
<!--    export default {-->
<!--        name: 'App',-->
<!--        data() {-->
<!--            return {-->
<!--                theme: "light"-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            changeTheme() {-->
<!--                console.log("I am changing theme");-->
<!--                this.theme = this.theme === "dark" ? "light" : "dark";-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->
<!--<style>-->
<!--.main-body{-->
<!--    height: 100vh;-->
<!--    padding: 0 2px 0 2px;-->
<!--}-->
<!--.light-theme{-->
<!--    background-color: white;-->
<!--    color: black;-->
<!--}-->
<!--.dark-theme{-->
<!--    background-color:black ;-->
<!--    color:white ;-->
<!--}-->
<!--</style>-->




