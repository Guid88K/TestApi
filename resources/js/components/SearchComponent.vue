<template>
    <div class="container">
        <!--        <div class="row justify-content-center">-->
        <!--        </div>-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Bedrooms</th>
                                <th scope="col">Bathrooms</th>
                                <th scope="col">Storeys</th>
                                <th scope="col">Garages</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-if="showSearch===true" v-for="cari in caris" v-bind:key="cari.id">
                                <th scope="row">{{cari.id}}</th>
                                <td>{{cari.name}}</td>
                                <td>{{cari.price}}</td>
                                <td>{{cari.bedrooms}}</td>
                                <td>{{cari.bathrooms}}</td>
                                <td>{{cari.storeys}}</td>
                                <td>{{cari.garages}}</td>
                            </tr>
                            <tr v-if="showSearch===false" v-for="field_data in field_dates" v-bind:key="field_data.id">
                                <th scope="row">{{field_data.id}}</th>
                                <td>{{field_data.name}}</td>
                                <td>{{field_data.price}}</td>
                                <td>{{field_data.bedrooms}}</td>
                                <td>{{field_data.bathrooms}}</td>
                                <td>{{field_data.storeys}}</td>
                                <td>{{field_data.garages}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" v-model="name" id="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" v-model="price" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="disabledSelect">Bedrooms</label>
                    <select id="disabledSelect" v-model="bedrooms" class="form-control">
                        <option value="" selected>Select bedrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="disabledSelect1">Bathrooms</label>
                    <select id="disabledSelect1" v-model="bathrooms" class="form-control">
                        <option value="" selected>Select bathrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="disabledSelect2">Storeys</label>
                    <select id="disabledSelect2" v-model="storeys" class="form-control">
                        <option value="" selected>Select storeys</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="disabledSelect3">Garages</label>
                    <select id="disabledSelect3" v-model="garages" class="form-control">
                        <option value="" selected>Select garages</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <button @click.prevent="searchDate()" type="submit" class="btn btn-dark">
                    Submit
                </button>
                <button @click.prevent="clearDate()" class="btn btn-info">
                    Clear
                </button>
            </div>
        </div>
    </div>
</template>
<!--{{url('api/search')}}-->
<script>
    export default {
        data() {
            return {
                field_dates: [],
                name: '',
                price: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                showSearch: false,
                caris: [],
            }
        },
        created() {
            this.viewData();
        },
        methods: {
            searchDate() {
                fetch('/api/api_search?name=' + this.name + '&price=' +
                    this.price + '&bedrooms=' + this.bedrooms + '&bathrooms=' + this.bathrooms +
                    '&storeys=' + this.storeys + '&garages=' + this.garages)
                    .then(res => res.json())
                    .then(res => {

                        this.caris = res;
                        this.name = '';
                        this.price = '';
                        this.bedrooms = '';
                        this.bathrooms = '';
                        this.storeys = '';
                        this.garages = '';
                        this.showSearch = true;
                    }).catch(err => {
                    console.log(err);
                });
            },
            clearDate() {
                this.name = '';
                this.price = '';
                this.bedrooms = '';
                this.bathrooms = '';
                this.storeys = '';
                this.garages = '';
                this.showSearch = false;
            },
            viewData() {
                fetch('api/data')
                    .then(res => res.json())
                    .then(res => {
                        this.field_dates = res.data
                    })
                    .catch(err => console.log(err))
            }
        },

        mounted() {

        }
    }
</script>
