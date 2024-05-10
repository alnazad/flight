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
hr{
  border: 1.5px solid blue;
}
</style>


<template>
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
                <p v-for="(d, i) in d.itineraries[0].segments" :key="i">{{ d.departure.iataCode+'-'+d.arrival.iataCode }}</p>
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
                 <p class="inline-p"  v-for="(du, i) in d.itineraries[0].duration" :key="i">{{ du }}</p>
                 
              </td>
              <td >
                <p>{{ d.price }}</p>
                <a class="btn btn-primary" href="">Select</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>