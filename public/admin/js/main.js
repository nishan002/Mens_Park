/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()

// Script for google map 
function initMap() {
  const myLatLng = { lat: 23.81561738462228, lng: 90.42583743878245 };
  const map = new google.maps.Map(document.getElementById("map"), {
  zoom: 14,
  center: myLatLng,
  mapId: "2b85e1fd7d101f0",
  });

  new google.maps.Marker({
  position: { lat: 23.81561738462228, lng: 90.42583743878245 },
  map,
  title: "Hello World!",
  });
}

window.initMap = initMap;