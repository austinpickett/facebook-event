<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" ng-app="MyApp">
<head>
	<title>Facebook Events</title>

	<link rel="stylesheet" href="assets/css/core.css" />

	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/foundation.css">


	<script src="assets/js/vendor/modernizr.js"></script>
</head>
<body ng-controller="MainCtrl" itemscope itemtype="http://schema.org/WebPage">
	<div class="row">
		<div class="large-12 columns">
			<h1>Facebook Events <span ng-show="search" ng-cloak>for {{search}}</span></h1>
		</div>
	</div>
    <form>
		<div class="row">
			<div class="large-6 columns">
				<label>Search Facebook Page (ex: HOBBoston, MidEastClub, BrightonMusicHall)</label>
				<input type="text" placeholder="Search Facebook Pages" ng-model="search" ng-change="changeAlert()" />
			</div>
			<div class="large-6 columns">
				<label>Search for intended event</label>
				<input type="text" placeholder="Search for Event" ng-model="band" />
			</div>
		</div>
	</form>


	<div class="row">

		<div class="large-12 columns">
			<table width="100%" ng-show="search">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time Period</th>
						<th>Performance</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="e in events.data | orderBy: 'start_time' | filter:band" ng-if="events.data">
						<td class="date" ng-cloak>{{e.start_time | date: 'mediumDate'}}</td>
						<td class="time" ng-cloak>{{e.start_time | date: 'shortTime'}} - {{e.end_time | date: 'shortTime'}}</td>
						<td class="band" ng-cloak>{{e.name}}</td>
						<td class="info" ng-cloak>
							<a href="http://facebook.com/events/{{e.id}}" target="_blank" class="button tiny">More Info</a>
						</td>
					</tr>

					<tr ng-if="!events.data">
						<td ng-cloak>No Matching Page of {{search}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

    <div class="row" ng-show="search">
		<div class="small-3 small-centered columns">  	
			<button class="small button" ng-if="events.paging.previous" ng-click="beforeLink(events.paging.cursors.before)">Before</button>

			<button class="small button" ng-if="events.paging.next" ng-click="afterLink(events.paging.cursors.after)">After</button>
		</div>
    </div>
    
    <div class="row">
      <div class="large-12 columns">
      	<div class="panel">
	        <h3>Thanks for checking out my project</h3>
	        <p>This application uses Facebook Graph API and Angular JS to power all the magic.</p>
	        <p>Feel free to check out the <a href="http://blog.austinkpickett.com/using-angularjs-and-facebook-graph-api-to-create-a-searchable-event-list/" target="_blank">detailed blog article</a> on the development of this application.</p>
	        <p>If you have any questions or comments, shoot me a line on twitter: <a href="http://twitter.com/austinpickett" target="_blank">@austinpickett</a></p>
      	</div>
      </div>
    </div>

	<div class="row">
		<div class="large-12 columns">
	    	<div class="large-4 medium-4 columns">
				<p><a href="https://github.com/Ciul/angular-facebook" target="_blank">Angular-Facebook</a><br />An Angularjs module to take approach of Facebook javascript sdk. Written by <a href="http://luiscarlosjayk.com" target="_blank">Luis Carlos</a></p>
			</div>
	    	<div class="large-4 medium-4 columns">
	    		<p><a href="https://angularjs.org/" target="_blank">Angular JS</a><br />AngularJS is an open-source web application framework, maintained by Google and community, that assists with creating single-page applications.</p>
	    	</div>
	    	<div class="large-4 medium-4 columns">
	    		<p><a href="https://developers.facebook.com/docs/graph-api/" target="_blank">Facebook Graph API</a><br />Using the Graph API you are able to post new stories, upload photos, retrieve posts and a variety of other tasks that an app might need to do. This guide will teach you how to accomplish all these things in the Graph API.</p>
	    	</div> 
	    </div>
	</div>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
    <script src="http://rawgithub.com/Ciul/angular-facebook/master/lib/angular-facebook.js"></script>
    <script src="assets/js/script2.js"></script>
  	
  	
	<script src="assets/js/vendor/jquery.js"></script>
	<script src="assets/js/foundation.min.js"></script>
	<script>
		$(document).foundation();
	</script>
  </body>
</html>