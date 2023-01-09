<template>
    <div>
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <p class="float-left font extrabold">Update Employee</p>
                        </div>
                        <div>

                            <router-link :to="{name:'EmployeesIndex'}" class="float-right
                            bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full"
                                         style="text-decoration: none;">
                                <i class="fa-sharp fa-solid fa-arrow-left"></i> &nbsp; Back
                            </router-link>


                        </div>
                    </div>


                    <div class="card-body">

                        <div class="container">


                            <form @submit.prevent="updateEmployee()" method="POST" action="">

                                <div class="row mb-3">
                                    <label for="first_name"
                                           class="col-md-4 col-form-label text-md-end">First Name</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text"
                                               class="form-control"
                                               v-model="form.first_name"
                                               required autocomplete="name" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="first_name"
                                           class="col-md-4 col-form-label text-md-end">Middle Name</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text"
                                               class="form-control"
                                               name="first_name"
                                               v-model="form.middle_name"
                                               required autocomplete="name" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name"
                                           class="col-md-4 col-form-label text-md-end">Last Name</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text"
                                               class="form-control @error('name')" v-model="form.last_name"
                                               name="last_name"
                                               required autocomplete="name" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="birthdate"
                                           class="col-md-4 col-form-label text-md-end">Date Of Birth &nbsp;<i
                                        class="fa-solid fa-calendar-days"></i></label>

                                    <div class="col-md-6">
                                        <input type="date" name="birthdate" v-model="form.birthdate"
                                               class="form-control"/>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="date_hired"
                                           class="col-md-4 col-form-label text-md-end">Date Of Hire &nbsp;<i
                                        class="fa-solid fa-calendar-days"></i></label>
                                    <div class="col-md-6">
                                        <input type="date" name="date_hired" v-model="form.date_hired"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <input id="text" type="text"
                                               name="address"
                                               class="form-control" v-model="form.address"
                                               required autocomplete="text">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="department_id"
                                           class="col-md-4 col-form-label text-md-end">Department Name</label>

                                    <div class="col-md-6">
                                        <select v-model="form.department_id" name="department_id" id="department_id	"
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

                                <div class="row mb-3">
                                    <label for="country_id"
                                           class="col-md-4 col-form-label text-md-end">Country Name</label>

                                    <div class="col-md-6">
                                        <select @change="getStates()" v-model="form.country_id" name="country_id"
                                                id="country_id" class="bg-white border border-gray-300
                                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose A Country</option>
                                            <option :value="country.id" v-for="country in countries" :key="country.id">
                                                {{ country.name }}
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="state_id"
                                           class="col-md-4 col-form-label text-md-end">State Name</label>

                                    <div class="col-md-6">
                                        <select @change="getCities()" v-model="form.state_id" name="state_id"
                                                id="state_id" class="bg-white border border-gray-300
                                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose A State</option>
                                            <option :value="state.id" v-for="state in states" :key="state.id">
                                                {{ state.name }}
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="city_id"
                                           class="col-md-4 col-form-label text-md-end">City Name</label>

                                    <div class="col-md-6">
                                        <select v-model="form.city_id" name="city_id" id="city_id" class="bg-white border border-gray-300
                                    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                                    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Choose A City</option>

                                            <option :value="city.id" v-for="city in cities" :key="city.id">
                                                {{ city.name }}
                                            </option>
                                        </select>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="zip_code"
                                           class="col-md-4 col-form-label text-md-end">Zip Code</label>

                                    <div class="col-md-6">
                                        <input id="zip_code" type="text"
                                               class="form-control"
                                               name="zip_code"
                                               v-model="form.zip_code"
                                               required autocomplete="zip_code" autofocus>
                                    </div>
                                </div>


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-3 rounded-lg">
                                            &nbsp; Update &nbsp; <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Datepicker from 'vue3-datepicker';
import {ref} from 'vue';
import moment from "moment";

export default {
    name: "edit",
    data() {
        return {
            departments: ref([]),
            countries: ref([]),
            states: ref([]),
            cities: ref([]),
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null
            }
        }
    },
    components: {
        Datepicker,
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployee();
    },
    methods: {

        async getEmployee() {
            await axios
                .get('/api/employees/' + this.$route.params.id)
                .then(res => {

                    console.log(res.data.data);
                    this.form.first_name = res.data.data.first_name
                    this.form.last_name = res.data.data.last_name
                    this.form.middle_name = res.data.data.middle_name
                    this.form.address = res.data.data.address
                    this.form.country_id = res.data.data.country_id
                    this.form.state_id = res.data.data.state_id
                    this.form.department_id = res.data.data.department_id
                    this.form.city_id = res.data.data.city_id
                    this.form.zip_code = res.data.data.zip_code
                    this.form.birthdate = moment(res.data.data.birthdate).utc().format('YYYY-MM-DD')
                    this.form.date_hired = moment(res.data.data.date_hired).utc().format('YYYY-MM-DD')

                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries() {
            axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data;
                }).catch(error => {
                console.log(error);
            })
        },

        getDepartments() {
            axios.get('/api/employees/departments')
                .then(res => {
                    this.departments = res.data;
                }).catch(error => {
                console.log(error);
            })
        },

        getStates() {
            axios.get('/api/employees/' + this.form.country_id + '/states')
                .then(res => {
                    this.states = res.data;
                }).catch(error => {
                console.log(error);
            })
        },
        getCities() {
            axios.get('/api/employees/' + this.form.state_id + '/cities')
                .then(res => {
                    this.cities = res.data;
                }).catch(error => {
                console.log(error);
            })
        },

        updateEmployee() {
            axios.put('/api/employees/'+this.$route.params.id, {
                'first_name': this.form.first_name,
                'last_name': this.form.last_name,
                'middle_name': this.form.middle_name,
                'address': this.form.address,
                'department_id': this.form.department_id,
                'country_id': this.form.country_id,
                'state_id': this.form.state_id,
                'city_id': this.form.city_id,
                'zip_code': this.form.zip_code,
                'birthdate': this.format_date(this.form.birthdate),
                'date_hired': this.format_date(this.form.date_hired),
            })
                .then(res => {
                    console.log(res);
                    this.$router.push({name: 'EmployeesIndex'});
                })
        },

        format_date(date) {
            if (date) {
                return moment(String(date)).format('YYYYMMDD')
            }
        }
    }
}
</script>

<style scoped>

</style>
