<!-- <script>
import { loadLocaleMessages, setI18nLanguage, i18n } from "../../i18n";
export default {
  data() {
    return {
      locale: "en",
    };
  },
  methods: {
    switchLocale() {
      loadLocaleMessages(i18n, this.locale);
      setI18nLanguage(i18n, this.locale);
    //   if (this.locale == "en") {
    //     const style = document.createElement("style");
    //     style.innerHTML = `*{direction:ltr!important;}`;
    //     document.head.appendChild(style);
    //   } else if (this.locale == "ar") {
    //     const style = document.createElement("style");
    //     style.innerHTML = `*{direction:rtl!important}`;
    //     document.head.appendChild(style);
    //   }
    },
  },
};
</script>

<template>
  <div>
    <select @change="switchLocale()" v-model="locale">
      <option value="ar">عربي</option>
      <option value="en">English</option>
    </select>
  </div>
</template> -->
<template>
  <div>
    <select v-model="$i18n.locale" @change="switchLanguage()">
        <option v-for="(lang, i) in langs" :key="`Lang${i}`" :value="lang">
          {{ lang }}
        </option>
      </select>
  </div>
</template>
<script>
import { loadLocaleMessages, setI18nLanguage, i18n } from "../../i18n";
export default {
    data() {
        return {
            langs: ['ar', 'en'],
            locale: "en"
        }
    },
  methods: {
    switchLanguage(key) {
      loadLocaleMessages(i18n, key);
      setI18nLanguage(i18n, key);
      this.$i18n.locale = key;
      this.$inertia.put("/laravel-language/" + key);
    },
  },
};
</script>
<!-- <template>
  <div v-if="$i18n.locale == 'en'">
    <a @click.prevent="switchLanguage('ar')" href="#"> English </a>
  </div>
  <div v-if="$i18n.locale == 'ar'">
    <a @click.prevent="switchLanguage('en')" href="#"> Arabic </a>
  </div>
</template>

<script>
import { loadLocaleMessages, setI18nLanguage, i18n } from "../../i18n";
export default {
  methods: {
    switchLanguage(key) {
      loadLocaleMessages(i18n, key);
      setI18nLanguage(i18n, key);
      this.$i18n.locale = key;
      this.$inertia.put("/laravel-language/" + key);
    },
  },
};
</script> -->
