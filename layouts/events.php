<h2>Events</h2>
<p>
  There are multiple <abbr title="Capture The Flag">CTF</abbr> events which are
  not time limited. They are great for those who are looking for a gentle
  introduction.
</p>
<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
  </tr>
  <tr>
    <td><a href="https://overthewire.org">OverTheWire</a></td>
    <td>
      <p>
        A classic collection of wargames ranging in levels of difficulty.
        Great for those not yet familiar with Linux and bash.
       </p>
    </td>
  </tr>
  <tr>
    <td><a href="https://picoctf.com">picoCTF</a></td>
    <td>
      <p>
        A great introductory event with a story in the background.
      </p>
    </td>
  </tr>
</table>
<div data-ng-app="app" data-ng-controller="ctf" class="invisible" id="events">
  <h3>Upcoming events:</h3>
  <table class="events" data-ng-if="eventsLoaded">
    <thead>
      <tr>
        <th>Event</th>
        <th>Start</th>
        <th>End</th>
      </tr>
    </thead>
    <tr data-ng-repeat="ctf in events">
      <td><a href="{{ctf.url}}">{{ctf.title}}</a></td>
      <td>{{ctf.start}}</td>
      <td>{{ctf.finish}}</td>
    </tr>
  </table>
  <span data-ng-if="eventsLoaded === false">Couldn't load events</span>
</div>
