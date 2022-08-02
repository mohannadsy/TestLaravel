<script>
import { loadLocaleMessages, setI18nLanguage, i18n  } from '../../i18n'
export default {
    data() {
        return{
            locale: 'en',
        }
    },
    methods: {
        switchLocale() {
            loadLocaleMessages(i18n, this.locale)
            setI18nLanguage(i18n, this.locale)
        }
    }
}
</script>

<template>
    <div>
        <select @change="switchLocale()" v-model="locale">
            <option value="en">English</option>
            <option value="ar">عربي</option>
        </select>
    </div>
</template>
