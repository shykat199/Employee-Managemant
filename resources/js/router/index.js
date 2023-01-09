import {createWebHistory,createRouter} from "vue-router";

import CreateComponent from '../components/employees/create.vue';
import IndexComponent from '../components/employees/index.vue';
import EditComponent from '../components/employees/edit.vue';

const routes=[

    {
        path:'/employees',
        name:'EmployeesIndex',
        component:IndexComponent
    },
    {
        path:'/employees/create',
        name:'EmployeesCreate',
        component:CreateComponent
    },
    {
        path:'/employees/:id',
        name:'EmployeesEdit',
        component:EditComponent,
        props:true,

    }

];

const router=createRouter({
    history:createWebHistory(),
    routes
})

export default router;
