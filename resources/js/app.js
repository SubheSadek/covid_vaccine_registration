import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";
import Apps from "./App.vue";
import svgIcons from "./Helpers/globalSvgIcons.vue";

import router from "./router";
import "view-ui-plus/dist/styles/viewuiplus.css";
import globals from "./Helpers/globals";
const app = createApp({});
app.use(router);

app.mixin(globals);
app.component("main-content", Apps);
app.component("svg-icon", svgIcons);
app.mount("#app");
