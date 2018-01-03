import * as $ from 'jquery'
import 'jqueryui'
import * as angular from 'angular'
import * as React from 'react'
import * as ReactDOM from 'react-dom'
import { SearchApp } from './search'

$(() => {
  // jQuery UI
  $('form').tooltip()

  $('#newsletter-warning').dialog({
    autoOpen: false
  })

  const forms = $('form')
  if (forms.length > 0 && forms[0].id === 'newsletter') {
    const newsletter = forms[0]
    $(newsletter).submit((e) => {
      if (($('#name')[0] as HTMLInputElement).value === '') {
        e.preventDefault()
        $('#newsletter-warning').dialog('open')
      }
    })
  }

  try {
    if (!sessionStorage.getItem('timeEntered')) {
      const now = new Date()
      sessionStorage.setItem('timeEntered', now.getTime().toString())
    }

    const timer = document.createElement('p')
    timer.id = 'timer'
    document.querySelector('footer').appendChild(timer)

    setInterval(() => {
      const now = new Date()
      const timeEntered = Number(sessionStorage.getItem('timeEntered'))
      const difference = Math.floor((now.getTime() - timeEntered) / 1000)
      const timer = document.getElementById('timer');
      timer.innerHTML = `You have been here for ${formatTime(difference)}`
    }, 1000)

    const counter = document.createElement('p')
    counter.id = 'counter'
    document.querySelector('footer').appendChild(counter)

    const visits = localStorage.getItem('visits')
    if (!visits) {
      localStorage.setItem('visits', '1')
      sessionStorage.setItem('visited', 'true')
    } else {
      let nVisits = Number(visits)
      if (!sessionStorage.getItem('visited')) {
        nVisits += 1
        localStorage.setItem('visits', nVisits.toString())
        sessionStorage.setItem('visited', 'true')
      }
      counter.innerHTML = `This is your ${verbalize(nVisits)} visit`
    }
  } catch (e) {
    console.log("Couldn't use Storage")
  }

  const app = angular.module('app', [])
  app.controller('ctf', ($scope, $http) => {
    const start = Math.floor(new Date().getTime() / 1000)
    const finish = start + 3600 * 24 * 7 * 8 // 8 weeks in the future
    const url = `${location.origin}/api?limit=10&start=${start}&finish=${finish}`
    console.log(url)
    $http.get(url).then(resp => {
      const events = resp.data.
        filter((event) => !event.onsite).
        map((event) => {
          const startDate = new Date(Date.parse(event.start))
          const start = `${MONTHS[startDate.getMonth()]}, ${verbalize(startDate.getDate())}`
          const finishDate = new Date(Date.parse(event.finish))
          const finish = `${MONTHS[finishDate.getMonth()]}, ${verbalize(finishDate.getDate())}`
          return {
            title: event.title,
            url: event.url,
            start,
            finish
          }
        })
      $scope.events = events
      $scope.eventsLoaded = true
      $('#events').removeClass('invisible')
    }, resp => {
      $scope.eventsLoaded = false
      $('#events').removeClass('invisible')
    })
  })

  const searchApp = document.getElementById('search-app')
  if (SearchApp) {
    ReactDOM.render(<SearchApp />, searchApp);
  }
})

function formatTime(time: number): string {
  const units: [number, string][] = [
    [86400, 'day'],
    [3600, 'hour'],
    [60, 'minute'],
    [1, 'second']
  ]

  const formatted = []

  for (let pair of units) {
    const seconds = pair[0]
    let name = pair[1]
    const amount = Math.floor(time / seconds)

    if (amount > 0) {
      if (amount != 1) {
        name += 's'
      }
      formatted.push(`${amount} ${name}`)
      time = time % seconds
    }
  }

  return formatted.join(' ')
}

function verbalize(n: number): string {
  if (n % 10 == 1) {
    return `${n}st`
  }
  if (n % 10 == 2) {
    return `${n}nd`
  }
  return `${n}rd`
}

const MONTHS = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"]
