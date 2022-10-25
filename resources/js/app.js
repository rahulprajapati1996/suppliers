import './bootstrap';
import { createApp } from 'vue';
const app = createApp({});

import SupplierList from './components/supplier/SupplierList.vue';
app.component('supplier-list', SupplierList);
app.mount('#app');
