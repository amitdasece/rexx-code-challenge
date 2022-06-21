<h2 dir="auto" data-sourcepos="26:1-26:15"> <a aria-hidden="true" href="#rexx-code" id="user-content-rexx"></a>REXX Code Challenge</h2>
<p dir="auto" data-sourcepos="2:1-2:62">Presentation of Event Management and showing the listing with filteration using Employee Name, Event Name and Event Date </p>
<p dir="auto" data-sourcepos="4:1-6:164">The Event Management changed the timezone of the Event date.  Prior to version 1.0.17+60 it was Europe/Berlin.  Afterwards it is UTC. Here I presume the standard timezone is UTC and changed the event date according to that timezone considering the condition of version comparison.</p>

<h2 dir="auto" data-sourcepos="26:1-26:15"> <a aria-hidden="true" href="#installation" id="user-content-installation"></a>Installation</h2>
<ul dir="auto" data-sourcepos="28:1-34:78">
  <li data-sourcepos="28:1-29:1">Clone git from the Repository (git clone <a rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/rexx-code-challenge.git">https://github.com/amitdasece/rexx-code-challenge.git</a> )</li>
  <li data-sourcepos="32:1-32:65">Create Database and put Database name in connection.php </li>
  <li data-sourcepos="33:1-33:43">Update the Database username &quot;root&quot; in connection.php </li>
  <li data-sourcepos="34:1-34:78">Change DB Password in connection.php(If any), otherwise leave blank</li>
  <li>RUN <a rel="nofollow noreferrer noopener" href="http://localhost:8080/rexx-code-challenge/webservices.php">http://localhost:8080/rexx-code-challenge/webservices.php</a> in your browser to update the JSON data in the database</li>
  <li>RUN <a rel="nofollow noreferrer noopener" href="http://localhost:8080/rexx-code-challenge/events.php">http://localhost:8080/rexx-code-challenge/events.php</a> in your browser to check the events listing. </li>
</ul>


<h2 dir="auto" data-sourcepos="12:1-12:59"> <a aria-hidden="true" href="#read-the-json-data-and-save-it-to-the-database-using-php" id="user-content-read-the-json-data-and-save-it-to-the-database-using-php"></a>Read the json data and save it to the database using php</h2>
<p dir="auto" data-sourcepos="14:1-15:39">Check this file for code:  webservices.php</p>

<h2 dir="auto" data-sourcepos="43:1-43:10"> <a aria-hidden="true" href="#testing" id="user-content-testing"></a>Testing</h2>
<ul dir="auto" data-sourcepos="45:1-46:0">
  <li data-sourcepos="45:1-46:0">Custom built phpunit</li>
</ul>
<p dir="auto" data-sourcepos="51:1-51:53">Performed 2 test cases to check the Time Conversion and another with Version comparison </p>
<p dir="auto" data-sourcepos="57:1-57:91">functions.php is the file where test functions are initiated.Function name are mentioned in below:</p>
<ul dir="auto" data-sourcepos="59:1-62:0">
  <li data-sourcepos="59:1-59:21">testTimeZoneConvert</li>
  <li data-sourcepos="60:1-62:0">testVersionCompareToCalculateEventDate</li>
  
</ul>
<p>RUN <a rel="nofollow noreferrer noopener" href="http://localhost:8080/rexx-code-challenge/testTimeZoneConvert.php">http://localhost:8080/rexx-code-challenge/testTimeZoneConvert.php</a> in your browser to check the Time Zone Conversion</p>
<p>RUN <a rel="nofollow noreferrer noopener" href="http://localhost:8080/rexx-code-challenge/testVersionCompareToCalculateEventDate.php">http://localhost:8080/rexx-code-challenge/testVersionCompareToCalculateEventDate.php</a> in your browser to check the Time Zone Conversion along with version comparison</p>
<h2 dir="auto" data-sourcepos="63:1-63:10"> <a aria-hidden="true" href="#license" id="user-content-license"></a>License</h2>

<h2 dir="auto" data-sourcepos="17:1-17:16"> <a aria-hidden="true" href="#prerequisites" id="user-content-prerequisites"></a>Prerequisites</h2>
<ul dir="auto" data-sourcepos="19:1-25:0">
  <li data-sourcepos="19:1-19:9">PHP 7.2</li>
  <li data-sourcepos="20:1-20:7">Mysql</li>
  <li data-sourcepos="22:1-22:22">yajra datatables 9.8</li>
</ul>

<h2 dir="auto" data-sourcepos="8:1-8:13"> <a aria-hidden="true" href="#screenshot" id="user-content-screenshot"></a>Screenshot</h2>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events.png" alt="alt text" src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events.png" loading="lazy"></a></p>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events_filtering.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events_filtering.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events_filtering.png" alt="alt text" src="https://github.com/amitdasece/rexx-code-challenge/blob/main/screenshot_events_filtering.png" loading="lazy"></a></p>

<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/timezone_testing.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/rexx-code-challenge/blob/main/timezone_testing.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/timezone_testing.png" alt="alt text" src="https://github.com/amitdasece/rexx-code-challenge/blob/main/timezone_testing.png" loading="lazy"></a></p>

<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/version_testing.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/rexx-code-challenge/blob/main/version_testing.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/rexx-code-challenge/blob/main/version_testing.png" alt="alt text" src="https://github.com/amitdasece/rexx-code-challenge/blob/main/version_testing.png" loading="lazy"></a></p>

<p dir="auto" data-sourcepos="65:1-65:117"> PHP is open-sourced software licensed under the <a rel="nofollow noreferrer noopener" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>
