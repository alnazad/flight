<script>
import axios from 'axios'
export default {
  data() {
    return {
      data: [],

    }
  },
  methods: {
    getData() {
      axios.get('http://localhost:8000/api/flights')
        .then((result) => {
          this.data = result.data;
          console.log(this.data);
        })
    }
  },
  mounted() {
    this.getData();
  }
}
</script>
<style>
.red-row-border {
  border: 1.5px solid red;
}

.no-wrap {
  white-space: nowrap;
  height: 20px;
  width: 20px;
}

.inline-p {
  display: inline;
}

hr {
  border: 1.5px solid blue;
}

.btna {
  background-color: #2e3791;
  color: white;
}
.btnn{
  height: 40px;
  width: 180px;
  margin-left: 10px;
}
</style>


<template>
  <div class="card">
    <div class="row">
      <hr>
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4" style="margin-bottom: 15px;"><button>Round Trip</button><button class="btna">One way</button><button>Multi City</button></div>
        <div class="col-4"></div>
      </div>
      <hr>
      <div class="row">
        <div style="margin-bottom: 15px;">
          <select class="btnn">
            <option value="">LHR</option>
          </select>
          <select class="btnn">
            <option value="">CDG</option>
        </select>
          <input type="date" class="btnn">
          <button class="btnn">Day - &nbsp; <i class="fa-solid fa-angle-down"></i></button>
          <button class="btnn">Day + &nbsp; <i class="fa-solid fa-angle-down"></i></button>
          <select class="btnn" name="" id="">
            <option value="">Any time</option>
          </select>
          +
          <select class="btnn" name="" id="">
            <option value="">ADT</option>
          </select>
          <select class="btnn" name="" id="">
            <option value="">Any time</option>
          </select>
          &nbsp; + &nbsp;
          <select class="btnn" name="" id="">
            <option value="">1</option>
          </select>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-4">
          <input type="checkbox" name="" id=""> <b>Extra Options</b>
        </div>
        <div class="col-4">
          <b>Environment</b> &nbsp;
          <input id="Dummy" type="radio" name="Environment" value="Dummy"> &nbsp;<b>Dummy</b>&nbsp;
          <input id="PDT" type="radio" name="Environment" value="PDT"> &nbsp;<b>PDT</b>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <button class="btna btn ">Search</button>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <hr>
    <h5 class="card-header">Data parsed successfully</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
          <thead>
            <tr class="table-secondary">
              <th>Flight</th>
              <th>Aircraft</th>
              <th>Class</th>
              <th>FARE</th>
              <th>ROUTE</th>
              <th>DEPARTURE</th>
              <th>ARRIVAL</th>
              <th></th>
              <th>DURATION</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="red-row-border " v-for="(d, i) in data.flightOffer" :key="i">
              <td>
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.carrierCode + '' + d.flightNumber }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.flightNumber }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.class[0]" :key="i">{{ d }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.fareBasis[0]" :key="i">{{ d }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.departure.iataCode + '-' +
              d.arrival.iataCode
                  }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.departure.at }}</p>
              </td>
              <td>
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.arrival.at }}</p>
              </td>
              <td>
                <p>----</p>
                <p>----</p>
              </td>
              <td>
                <p class="inline-p" v-for="(du, i) in d.itineraries[0].duration" :key="i">{{ du }}</p>

              </td>
              <td>
                <p>{{ d.price }}</p>
                <a class="btna btn" href="">Select</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>