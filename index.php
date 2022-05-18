<html>

<head>
	<TITLE>jQuery AJAX Autocomplete - Country Example</TITLE>

	<head>

		<style>
			body {
				width: 610px;
			}

			.frmSearch {
				border: 1px solid #a8d4b1;
				background-color: #c6f7d0;
				margin: 2px 0px;
				padding: 40px;
				border-radius: 4px;
			}

			#country-list {
				float: left;
				list-style: none;
				margin-top: -3px;
				padding: 0;
				width: 190px;
				position: absolute;
			}

			#country-list li {
				padding: 10px;
				background: #f0f0f0;
				border-bottom: #bbb9b9 1px solid;
			}

			#country-list li:hover {
				background: #ece3d2;
				cursor: pointer;
			}

			#search-box {
				padding: 10px;
				border: #a8d4b1 1px solid;
				border-radius: 4px;
			}

			input,
			textarea,
			button {
				padding: 10px;
				width: 100%;
				margin: 10px;
			}
		</style>

		<script src="jquery.js" type="text/javascript"></script>

		<script>
			$(document).ready(function() {
				$("#search-box").keyup(function() {
					$("#addUseCountryButton").prop({
						disabled: true
					})
					$.ajax({
						type: "POST",
						url: "readCountry.php",
						data: 'keyword=' + $(this).val(),
						beforeSend: function() {
							$("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
						},
						success: function(data) {
							$("#suggesstion-box").show();
							$("#suggesstion-box").html(data);
							$("#search-box").css("background", "#FFF");
						}
					});
				});
			});

			function selectCountry(val) {
				$("#search-box").val(val);
				$("#suggesstion-box").hide();
				$("#addUseCountryButton").prop({
					disabled: false
				})
			}
		</script>
	</head>

<body>
	<div class="frmSearch">
		<form action="useCountry.php" method="POST">
			<input type="text" autocomplete="off" required name="countryName" id="search-box" placeholder="Country Name" />
			<div id="suggesstion-box"></div>
			<textarea name="note" required id="note" cols="30" rows="10"></textarea>
			<input type="submit" id="addUseCountryButton" required disabled name="submitted">
		</form>

	</div>
</body>

</html>