import {
    defineNuxtPlugin
} from "#app";
import PrimeVue from "primevue/config";
import ToastService from 'primevue/toastservice';
import ConfirmationService from 'primevue/confirmationservice';

import Button from "primevue/button";
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import InputSwitch from 'primevue/inputswitch';
import Tag from 'primevue/tag';
import FileUpload from 'primevue/fileupload';
import Chart from 'primevue/chart';
import Toast from 'primevue/toast';
import Image from 'primevue/image';
import Carousel from 'primevue/carousel';
import Avatar from 'primevue/avatar';
import AvatarGroup from 'primevue/avatargroup';
import Badge from 'primevue/badge';
import BadgeDirective from 'primevue/badgedirective';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     //optional for column grouping
import Row from 'primevue/row';                     //optional for row
import DataView from 'primevue/dataview';
import Paginator from 'primevue/paginator';
import ConfirmDialog from 'primevue/confirmdialog'
import Sidebar from 'primevue/sidebar';
import Tooltip from 'primevue/tooltip';
import Checkbox from 'primevue/checkbox';
import RadioButton from 'primevue/radiobutton';
import Password from 'primevue/password';
import Rating from 'primevue/rating';
import Textarea from 'primevue/textarea';
import Chips from 'primevue/chips';

export default defineNuxtPlugin((nuxtApp) => {

    // * plugins
    nuxtApp.vueApp.use(PrimeVue, {
        ripple: true
    });
    nuxtApp.vueApp.use(ToastService)
    nuxtApp.vueApp.use(ConfirmationService)

    // * components
    nuxtApp.vueApp.component('Button', Button); 
    nuxtApp.vueApp.component('InputText', InputText); 
    nuxtApp.vueApp.component('InputNumber', InputNumber);   
    nuxtApp.vueApp.component('InputSwitch', InputSwitch);  //switch
    nuxtApp.vueApp.component('Tag', Tag); 
    nuxtApp.vueApp.component('FileUpload', FileUpload);
    nuxtApp.vueApp.component('Chart', Chart);
    nuxtApp.vueApp.component('Toast', Toast);
    nuxtApp.vueApp.component('Image', Image);
    nuxtApp.vueApp.component('Carousel', Carousel);
    nuxtApp.vueApp.component('Avatar', Avatar);
    nuxtApp.vueApp.component('AvatarGroup', AvatarGroup);
    nuxtApp.vueApp.component('Badge', Badge);
    nuxtApp.vueApp.component('BadgeDirective', BadgeDirective);
    nuxtApp.vueApp.component('DataTable', DataTable);
    nuxtApp.vueApp.component('Column', Column);
    nuxtApp.vueApp.component('ColumnGroup', ColumnGroup);
    nuxtApp.vueApp.component('Row', Row);
    nuxtApp.vueApp.component('DataView', DataView);
    nuxtApp.vueApp.component('Paginator', Paginator);
    nuxtApp.vueApp.component('ConfirmDialog', ConfirmDialog);
    nuxtApp.vueApp.component('Sidebar', Sidebar);
    nuxtApp.vueApp.component('Tooltip', Tooltip);
    nuxtApp.vueApp.component('Checkbox', Checkbox);
    nuxtApp.vueApp.component('RadioButton', RadioButton);
    nuxtApp.vueApp.component('Password', Password);
    nuxtApp.vueApp.component('Rating', Rating);
    nuxtApp.vueApp.component('Textarea', Textarea);
    nuxtApp.vueApp.component('Chips', Chips); // for enter tags

});