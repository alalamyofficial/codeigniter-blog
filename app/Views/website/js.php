<!-- Bootstrap core JavaScript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.bxslider.js"></script>
<script src="/js/mooz.scripts.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var allowCookiesButton = document.getElementById('allowCookiesButton');
		var cookieBanner = document.getElementById('cookieBanner');

		allowCookiesButton.addEventListener('click', function() {
			// Set the cookie and hide the banner
			document.cookie = 'cookieConsent=1; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
			cookieBanner.style.display = 'none';
		});

		// Check if the user has already given consent and hide the banner if so
		if (document.cookie.indexOf('cookieConsent=1') > -1) {
			cookieBanner.style.display = 'none';
		}
	});
</script>


</body>
</html>