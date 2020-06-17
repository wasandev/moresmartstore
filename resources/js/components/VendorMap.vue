<template>
  <div>
    <h1>ที่ตั้งธุรกิจบน Google Map</h1>
    <map-loader
      :map-config="mapConfig"
      apiKey="AIzaSyCvMwFuW0tiyTDf3nrkANTnxs5mrGI9q2U"
    >
      <template slot-scope="scopeProps"> <!-- slot-scope -->
        <child-marker
          v-for="(marker,i) in markers"
          :key="i"
          :position="marker"
          :google="scopeProps.google"
          :map="scopeProps.map"
        />
      </template>
    </map-loader>
  </div>
</template>

<script>
import MapLoader from "./MapLoader.vue"
import ChildMarker from "./ChildMarker.vue"

export default {
  props: {
    markers: Array
  },
  data(){
    return {
      mapConfig: {
        zoom: 17,
        center: this.markers[0]
      }
    }
  },
  components: {
    MapLoader,
    ChildMarker
  }
}
</script>
