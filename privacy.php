<?php
if (!$_COOKIE['userid']){require("inc/lang/en.php"); include_once('inc/basic.php');}
else {
include_once('inc/config.php');
$query = mysql_query("SELECT lang FROM users WHERE password ='$koda' AND userid ='$userid' LIMIT 1");
if (mysql_num_rows($query)==1) {$lang = mysql_result($query,0);} else {$lang='en';}
require("inc/lang/".$lang.".php");
include_once('inc/header.php');
include_once('inc/osnova.php');
}
?>
<div id="main">
<h2>Privacy Policy</h2>

<table border="0" cellspacing="9" cellpadding="9" width="100%">
<tr valign="top" bgcolor="#ffffff">
<td class="border" width="99%">
<div id="privacy">
<h1>Basketsim Privacy Policy</h1>
This Privacy Policy governs the manner in which Basketsim collects, uses, maintains and discloses information collected from users (each, a "User") of the <a href="www.basketsim.com">www.basketsim.com</a> website ("Site"). This privacy policy applies to the Site and all products and services offered by Basketsim.<br><br>

<b>Personal identification information</b><br><br>

We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.<br><br>

<b>Non-personal identification information</b><br><br>

We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.<br><br>

<b>Web browser cookies</b><br><br>

Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.<br><br>

<b>How we use collected information</b><br><br>

Basketsim may collect and use Users personal information for the following purposes:<br>
<ul>
<li><i>- To personalize user experience</i><br>
	We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</li>
<li><i>- To improve our Site</i><br>
	We may use feedback you provide to improve our products and services.</li>
<li><i>- To run a promotion, contest, survey or other Site feature</i><br>
	To send Users information they agreed to receive about topics we think will be of interest to them.</li>
<li><i>- To send periodic emails</i><br>
We may use the email address to respond to their inquiries, questions, and/or other requests. If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc. </li>
</ul>
<b>How we protect your information</b><br><br>

We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.<br><br>

<b>Sharing your personal information</b><br><br>

We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.<br><br>

<b>Advertising</b><br><br>

Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile non personal identification information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy does not cover the use of cookies by any advertisers.<br><br>

<b>Google Adsense</b><br><br>

Some of the ads may be served by Google. Google's use of the DART cookie enables it to serve ads to Users based on their visit to our Site and other sites on the Internet. DART uses "non personally identifiable information" and does NOT track personal information about you, such as your name, email address, physical address, etc. You may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy at <a href="http://www.google.com/privacy_ads.html">http://www.google.com/privacy_ads.html</a><br><br>

<b>Changes to this privacy policy</b><br><br>

Basketsim has the discretion to update this privacy policy at any time. When we do, we will post a notification on the main page of our Site. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.<br><br>

<b>Your acceptance of these terms</b><br><br>

By using this Site, you signify your acceptance of this policy and <a href="http://www.basketsim.com/terms.php">terms of service</a>. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.<br><br>

<b>Contacting us</b><br><br>

If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:<br>
<a href="www.basketsim.com">Basketsim</a><br>
<a href="www.basketsim.com">www.basketsim.com</a><br>
basketsim@basketsim.com<br>
<br>
This document was last updated on March 22, 2015<br><br>

<div style="font-size:10px;color:gray;">Privacy policy created by <a style="font-size:10px;color:gray;text-decoration:none;cursor:default;" href="http://www.generateprivacypolicy.com" target="_blank">Generate Privacy Policy</a></div></div>

</td>
</tr>
</table>
</div>
</div>
<script language="javascript">postamble();</script>
</body>
</html>

