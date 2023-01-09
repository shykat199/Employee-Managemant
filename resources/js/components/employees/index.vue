<template>
    <div>
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="col-md-12">
                <div v-if="showMessage">
                    <div class="alert alert-success">
                        {{message}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <a class="float-left font-extrabold " style="text-decoration: none; color: inherit;">All
                                    Employees</a>
                            </div>
                            <div class="col">
                                <form method="get" action=""
                                      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                               placeholder="Search for..."
                                               name="search"
                                               v-model.lazy="search"
                                               aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class=" no-underline px-4 py-2 bg-blue-700
                                            hover:bg-blue-600 text-white rounded-r">Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <label for="department_id"
                                           class="col-md-5 col-form-label text-md-end">Department</label>

                                    <div class="col-md-6">
                                        <select v-model="selectedDepartment" name="department_id" id="department_id	"
                                                class="bg-white border border-gray-300
                                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose A Department</option>
                                            <option :value="department.id" v-for="department in departments"
                                                    :key="department.id">
                                                {{ department.name }}
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <router-link :to="{name:'EmployeesCreate'}" class="float-right
                                bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full"
                                             style="text-decoration: none;">
                                    Create New Employee &nbsp; <i class=" fa-solid fa-arrow-right"></i>
                                </router-link>


                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="container">

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Employee Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Department
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            City
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Country
                                        </th>


                                        <th scope="col" class="px-6 py-3">
                                            <div class="flex items-center ml-5">
                                                Action
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(employee,index) in employees" :key="employee.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                           EmpId-{{ index +1 }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{ employee.first_name }} {{ employee.last_name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">
                                            {{ employee.address }}
                                        </th>

                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">

                                            {{ employee.department.name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">

                                            {{ employee.city.name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-600 whitespace-nowrap dark:text-white">

                                            {{ employee.country.name }}
                                        </th>


                                        <td class="px-6 py-4 text-right">
                                            <div class="flex space-x-2">


                                                <router-link :to="{ name: 'EmployeesEdit',
                                                params: {
                                                    id:employee.id
                                                }
                                                }" style="text-decoration: none !important;" class=" no-underline px-4 py-2 bg-green-500
                                                hover:bg-green-700 text-white rounded-lg">
                                                    Edit
                                                </router-link>

                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                    method="POST"
                                                    action=""
                                                    onsubmit="return confirm('Are you sure?');">

                                                    <button @click.prevent="deleteEmployee(employee.id)" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";

export default {
    name: "index",
    data() {
        return {
            employees: ref([]),
            idx: 1,
            showMessage:false,
            message:ref(''),
            search:null,
            selectedDepartment:null,
            departments:ref([])
        }
    },

    watch:{
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios.get('/api/employees',{params:{
                search:this.search,
                    department_id:this.selectedDepartment
                }})
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(e => {
                    console.log(e);
                })
        },

        getDepartments(){
            axios.get('/api/employees/departments')
                .then(res => {
                    this.departments = res.data;
                }).catch(error => {
                console.log(error);
            })
        },

        deleteEmployee(id) {
            axios.delete('/api/employees/'+id)
                .then(res=>{
                    this.showMessage=true;
                    this.message=res.data;
                    this.getEmployees();
                    console.log(res);
                })

        }
    }
}
</script>

<style scoped>

</style>
